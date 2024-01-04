<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Validator;
use Session;
use Auth;
use Requests;
use DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

use App\Models\Admin;
use App\Models\PasswordResets;
use App\Models\Customer;
use App\Models\Program;
use App\Models\Newpass;

use App\Mail\PasswordReset;
use App\Mail\NewPassMail;
use Illuminate\Support\Str;


class HomeController extends Controller
{


  public function chartdata() {
    $data = DB::table('customer')
        ->select('statuses.status', DB::raw('COALESCE(COUNT(customer.id), 0) as mycount'))
        ->rightJoin(
            DB::raw("(SELECT 'Aktívny' as status UNION SELECT 'Pozastavený' UNION SELECT 'Čaká sa na platbu' UNION SELECT 'Neaktívny') as statuses"),
            'customer.active',
            '=',
            'statuses.status'
        )
        ->groupBy('statuses.status')
        ->orderByRaw("FIELD(statuses.status, 'Aktívny', 'Pozastavený', 'Čaká sa na platbu', 'Neaktívny')")
        ->get();
    echo json_encode($data);
}

  public function dashboard(Request $request) {

    if(session()->has('admin')) {
        $id = Session::get("userID");
        $admin = Admin::where("id","=",$id)->first();
        $data["admin"] = $admin;

        $all = Customer::all()->count();
        $active = Customer::where("active","=","Aktívny")->count();
        $waiting = Customer::where("active","=","Čaká sa na úhradu")->count();
        $stopped = Customer::where("active","=","Pozastavený")->count();
        $inactive = Customer::where("active","=","Neaktívny")->count();
        $data['all'] = $all;

        $data['active'] = $active;
        $data['waiting'] = $waiting;
        $data['inactive'] = $inactive;
        $data['stopped'] = $stopped;

        $plus = intval($all) - 8;
        if($plus < 0) {
          $plus = 0;
        }
        $data['plus'] = $plus;

        $customers = Customer::select('*')->limit(8)->get();
        $data['customers'] = $customers;

        return view('home', $data);
    } else {
        return view('signin');
    }
  }

  public function customers() {
    if(!session()->has('admin')) {
     return Redirect::to('/')->withErrors(['status' => 'Relácia skončila, boli ste odhlásený!']);
     }
      else {
            $customer = Customer::orderByRaw("FIELD(active, 'Aktívny', 'Pozastavený', 'Čaká sa na platbu', 'Neaktívny')")->get();
            $program = [];
            foreach($customer as $c) {
              $prog = Program::select('expiration')->where("fk_customer","=",$c->id)->orderBy("id","desc")->limit(1)->first();
              if($prog) {
                array_push($program, $prog->expiration);
              } else {
                array_push($program, "");
              }
            }
            $count = Customer::all()->count();
            $data["customers"] = $customer;
            $data["program"] = $program;
            $data["count"] = $count;
            return view('customers', $data);
          }
    }


  public function logout(Request $request) {
      $request->session()->forget('admin');
      return redirect('/');
    }

  public function dologin() {


        $rules = array(
                    'email'    => 'required|email', // make sure the email is an actual email
                    'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
                );


                $validator = Validator::make(Requests::all(), $rules);


                if (strlen(Requests::get('email')) < 1) {
                    return Redirect::to('/')
                        ->withErrors(['email' => 'Email nemôže byť prázdny'])
                        ->withInput(Requests::except('password')); // send back the input (not the password) so that we can repopulate the form
                } else {

                    // create our user data for the authentication

                     $email = Requests::get('email');
                     $password =  Requests::get('password');

                     $user = Admin::where("email","=",$email)->first();


                if($user != null) {
                   if(Hash::check($password,$user->password)) {

                    $userID = $user->id;
                    $username = $user->fname." ".$user->lname;
                    $admin = "yes";
                    Session::put('userID',$userID);
                    Session::put('userName',$username);
                    Session::put('admin',$admin);

                    return redirect('/');


                  } else {
                    return Redirect::to('/')
                        ->withErrors(['email' => 'Používateľ s touto kombináciou emailu a hesla neexistuje']);
                  }
            } else {
                    return Redirect::to('/')
                        ->withErrors(['email' => 'Používateľ s touto kombináciou emailu a hesla neexistuje']);
            }
            }
      }


  public function resetPassword(Request $request)
      {
        if($request->submit == "submit")
        {
          $validator = Validator::make(Requests::all(), [
              'password' => 'required|alphaNum|min:8|confirmed']);

              if(strlen($request->input('password')) < 8) {
                return redirect()->back()
                    ->withErrors(['password' => 'Heslo musí obsahovať aspoň 8 znakov'])
                    ->withInput(Requests::except('password')); // send back the input (not the password) so that we can repopulate the form
              }

              if($request->input('password') != $request->input('password_confirmation')) {
                return redirect()->back()
                    ->withErrors(['password' => 'Heslá nezhodujú'])
                    ->withInput(Requests::except('password')); // send back the input (not the password) so that we can repopulate the form
              }

              if ($validator->fails()) {
                  return redirect()->back()
                      ->withErrors($validator) // send back all errors to the login form
                      ->withInput(Requests::except('password')); // send back the input (not the password) so that we can repopulate the form
              }

          $password = $request->input('password');
      // Validate the token
          $tokenData = PasswordResets::where('token', $request->input('token'))->first();
      // Redirect the user back to the password reset request form if the token is invalid
          if (!$tokenData) return view('forgotten_password');

          $user = Admin::where('email', $tokenData->email)->first();
      // Redirect the user back if the email is invalid
          if (!$user) return redirect()->back()->withErrors(['email' => 'Email nenájdený']);
      //Hash and update the new password
          $user->password = \Hash::make($password);
          $user->update(); //or $user->save();


          return Redirect::to('/')->withErrors(['email' => 'Nové heslo bolo úspešne nastavené!']);

          //Delete the token
          PasswordResets::where('email', $user->email)->delete();

        } else {
          return redirect()->back();
        }
      }




      public function resetPasswordCustomer(Request $request)
          {
            if($request->submit == "submit")
            {
              $validator = Validator::make(Requests::all(), [
                  'password' => 'required|alphaNum|min:8|confirmed']);

                  if(strlen($request->input('password')) < 8) {
                    return redirect()->back()
                        ->withErrors(['password' => 'Heslo musí obsahovať aspoň 8 znakov'])
                        ->withInput(Requests::except('password')); // send back the input (not the password) so that we can repopulate the form
                  }

                  if($request->input('password') != $request->input('password_confirmation')) {
                    return redirect()->back()
                        ->withErrors(['password' => 'Heslá nezhodujú'])
                        ->withInput(Requests::except('password')); // send back the input (not the password) so that we can repopulate the form
                  }

                  if ($validator->fails()) {
                      return redirect()->back()
                          ->withErrors($validator) // send back all errors to the login form
                          ->withInput(Requests::except('password')); // send back the input (not the password) so that we can repopulate the form
                  }

              $password = $request->input('password');
          // Validate the token
              $tokenData = Newpass::where('token', $request->input('token'))->first();
          // Redirect the user back to the password reset request form if the token is invalid
              if (!$tokenData) return view('newpass');

              $user = Customer::where('email', $tokenData->email)->first();
          // Redirect the user back if the email is invalid
              if (!$user) return redirect()->back()->withErrors(['email' => 'Email nenájdený']);
          //Hash and update the new password
              $user->password = \Hash::make($password);
              $user->update(); //or $user->save();


              return Redirect::to('/vitajte')->withErrors(['email' => 'Nové heslo bolo úspešne nastavené!']);

              //Delete the token
              Newpass::where('email', $user->email)->delete();

            } else {
              return redirect()->back();
            }
          }




  public function validatePasswordRequest(Request $request) {
      //You can add validation login here
      //$user = User::where('email', '=', $request->input('email'))->first();
      $user = Admin::where("email","=",$request->input('email'))->count();
      //Check if the user exists
      if ($user < 1) {
          return redirect()->back()->withErrors(['email' => trans('Používateľ sa nenašiel')]);
      }

      //Create Password Reset Token
      PasswordResets::insert([
          'email' => $request->input('email'),
          'token' => Str::random(60),
          'created_at' => Carbon::now()
      ]);
      //Get the token just created above
      $tokenData = PasswordResets::where('email', $request->input('email'))->latest()->first();

      if ($this->sendResetEmail($request->input('email'), $tokenData->token)) {
        return redirect()->back()->withErrors(['status' => trans('Pokyny pre resetovanie hesla boli odoslané na Váš email')]);
      } else {
          return redirect()->back()->withErrors(['error' => trans('Vyskytla sa neočakávaná chyba. Skúste znovu')]);
      }
        }

  private function sendResetEmail($email, $token) {
        //Retrieve the user from the database
        $user = Admin::where('email', $email)->select('fname', 'email')->first();
        //Generate, the password reset link. The token generated is embedded in the link
        $link = "https://dobroty.physcatch.sk/" . 'password/reset/' . $token . '/' . urlencode($user->email);

            try {
              //poslať email
              Mail::to($email)->send(new PasswordReset($link));
                return true;
                //return redirect()->back()->with('status', trans('Ak zadaná emailova adresa existuje v databáze, link na resetovanie hesla bude poslaný v emailovej správe.'));
            } catch (\Exception $e) {
                return false;
                //return redirect()->back()->with('status', trans('Ak zadaná emailova adresa existuje v databáze, link na resetovanie hesla bude poslaný v emailovej správe.'));
            }
        }


        private function sendResetEmailCustomer($email, $token) {
              //Retrieve the user from the database
              $user = Customer::where('email', $email)->select('fname', 'email')->first();
              //Generate, the password reset link. The token generated is embedded in the link
              $link = "https://dobroty.physcatch.sk/" . 'password/reset/' . $token . '/' . urlencode($user->email);

                  try {
                    //poslať email
                    Mail::to($email)->send(new NewPassMail($link));
                      return true;
                      //return redirect()->back()->with('status', trans('Ak zadaná emailova adresa existuje v databáze, link na resetovanie hesla bude poslaný v emailovej správe.'));
                  } catch (\Exception $e) {
                      return false;
                      //return redirect()->back()->with('status', trans('Ak zadaná emailova adresa existuje v databáze, link na resetovanie hesla bude poslaný v emailovej správe.'));
                  }
              }


    public function index_reset($key, $email) {
                      $data['key'] = $key;
                      $data['email'] = $email;
                      return view('reset', $data);
              }

  public function newpass($key, $email) {
                    $data['key'] = $key;
                    $data['email'] = $email;
                    return view('newpass', $data);
            }

  public function user_index() {
                if(session()->has('admin')) {
                    $users = Admin::all();
                    $data["admins"] = $users;
                    return view('admins', $data);
                } else {
                    return Redirect::to('/');
                }
              }


  public function add_admin(Request $request) {
                if(!session()->has('admin')) {
                 return Redirect::to('/')->withErrors(['status' => 'Relácia skončila, boli ste odhlásený!']);
              }
              else {


                      $email = Requests::get('email');
                      if($this->check_email($email)) {
                          return Redirect::to('/addsuper')
                              ->withErrors(['email' => 'Emailova adresa už existuje v databáze'])
                              ->withInput(Requests::except('password')); // send back the input (not the password) so that we can repopulate the form
                      }

                      if(strlen(Requests::get('password')) < 8) {
                        return Redirect::to('/addsuper')->withErrors(['email' => 'Heslo musí obsahovať minimálne 8 znakov.']);
                      }

                      $password =  Hash::make(Requests::get('password'));
                      $first_name = Requests::get('fname');
                      $last_name = Requests::get('lname');

                      $user = new Admin;

                      $user->fname = $first_name;
                      $user->lname = $last_name;
                      $user->password = $password;
                      $user->email = $email;


                      $user->save();


                      return Redirect::to('/admins');

              }
            }


            public function addmenu(Request $request) {
              if(!session()->has('admin')) {
               return Redirect::to('/')->withErrors(['status' => 'Relácia skončila, boli ste odhlásený!']);
              }
              else {
                // Validate the uploaded file, adjust validation rules as needed
                $request->validate([
                    'file' => 'required|file|max:1024', // Max file size: 1 MB
                ]);

                // Store the uploaded file in the storage
                $file = $request->file('file');
                // Store the file with a specific name in the storage/app/public directory
                $filePath = $file->storeAs('public', 'menu.pdf');


                 return response()->json(['redirect_url' => 'https://dobroty.physcatch.sk/menu']);
              }
            }

public function editedcustomer(Request $request) {

  if(!session()->has('admin')) {
   return Redirect::to('/')->withErrors(['status' => 'Relácia skončila, boli ste odhlásený!']);
  }
  else {

    $email = Requests::get('email');
    $id = Requests::get('id');
    $customer = Customer::where("id","=",$id)->first();

    if($email != $customer->email && $this->check_customer_email($email)) {
       return redirect()->back()->withInput()->with('showErrorModal', true);
    }


    $fname = Requests::get('fname');
    $lname = Requests::get('lname');
    $gender = Requests::get('gender');
    $mobil = Requests::get('phone');
    $goal = Requests::get('goal');
    $city = Requests::get('city');
    $age = Requests::get('age');
    $height = Requests::get('height');
    $weight = Requests::get('weight');

    $boky = Requests::get('boky');
    $pas = Requests::get('pas');
    $stehno = Requests::get('stehno');
    $alergies = Requests::get('alergies');
    $activity = Requests::get('activity');

    $inbody = Requests::get('inbody');
    $lifestyle = Requests::get('lifestyle');
    $payment = Requests::get('payment');
    $note = Requests::get('note');


    $customer->email = $email;
    $customer->fname = $fname;
    $customer->lname = $lname;
    $customer->gender = $gender;
    $customer->mobil = $mobil;

    $customer->goal = $goal;
    $customer->city = $city;
    $customer->age = $age;
    $customer->height = $height;
    $customer->weight = $weight;
    $customer->boky = $boky;
    $customer->pas = $pas;
    $customer->stehno = $stehno;
    $customer->alergies = $alergies;

    $customer->activity = $activity;
    $customer->inbody = $inbody;
    $customer->lifestyle = $lifestyle;
    $customer->payment = $payment;
    $customer->note = $note;

    $customer->update();

    return Redirect::to('/zakaznici');
  }
}


      public function addprogram(Request $request) {
                    if(!session()->has('admin')) {
                     return Redirect::to('/')->withErrors(['status' => 'Relácia skončila, boli ste odhlásený!']);
                  }
                  else {
                          $program = Requests::get('program');
                          $expiration = Requests::get('expiration');
                          $id = Requests::get('id');
                          $customer = Customer::where("id","=",$id)->first();



                          $newp = new Program;
                          $newp->program = $program;
                          $newp->fk_customer = $id;



                          if($expiration == null || $expiration == "" || $expiration == "null") {
                            if(substr($program,0,1) == "4") {
                              $currentDate = date('Y-m-d');
                              $newDate = date('Y-m-d', strtotime($currentDate . ' + 4 weeks'));
                              $expiration = $newDate;
                            }
                            if(substr($program,0,1) == "2") {
                              $currentDate = date('Y-m-d');
                              $newDate = date('Y-m-d', strtotime($currentDate . ' + 2 weeks'));
                              $expiration = $newDate;
                            }
                          }

                          $newp->expiration = $expiration;
                          $newp->save();
                          $customer->active = "Aktívny";
                          $customer->update();

                          return Redirect::to('/programy/'.$id);

                  }
                }




                public function programchanged(Request $request) {
                                    if(!session()->has('admin')) {
                                     return Redirect::to('/')->withErrors(['status' => 'Relácia skončila, boli ste odhlásený!']);
                                  }
                                  else {

                                          $program = Requests::get('program');
                                          $expiration = Requests::get('expiration');
                                          $id = Requests::get('id');

                                          $p = Program::where("id","=",$id)->get()->first();

                                          $p->program = $program;
                                          $p->expiration = $expiration;

                                          $p->update();
                                          return Redirect::to('/programy/'.$id);

                                  }
                                }


      public function addcustomer(Request $request) {
                          if(!session()->has('admin')) {
                           return Redirect::to('/')->withErrors(['status' => 'Relácia skončila, boli ste odhlásený!']);
                        }
                        else {


                                $email = Requests::get('email');

                                if($this->check_customer_email($email)) {
                                   return redirect()->back()->withInput()->with('showErrorModal', true);
                                }


                                $fname = Requests::get('fname');
                                $lname = Requests::get('lname');
                                $gender = Requests::get('gender');
                                $mobil = Requests::get('phone');
                                $goal = Requests::get('goal');
                                $city = Requests::get('city');
                                $age = Requests::get('age');
                                $height = Requests::get('height');
                                $weight = Requests::get('weight');

                                $boky = Requests::get('boky');
                                $pas = Requests::get('pas');
                                $stehno = Requests::get('stehno');
                                $alergies = Requests::get('alergies');
                                $activity = Requests::get('activity');

                                $inbody = Requests::get('inbody');
                                $lifestyle = Requests::get('lifestyle');
                                $payment = Requests::get('payment');
                                $note = Requests::get('note');

                                $customer = new Customer;

                                $customer->email = $email;
                                $customer->fname = $fname;
                                $customer->lname = $lname;
                                $customer->gender = $gender;
                                $customer->mobil = $mobil;

                                $customer->goal = $goal;
                                $customer->city = $city;
                                $customer->age = $age;
                                $customer->height = $height;
                                $customer->weight = $weight;
                                $customer->boky = $boky;
                                $customer->pas = $pas;
                                $customer->stehno = $stehno;
                                $customer->alergies = $alergies;

                                $customer->activity = $activity;
                                $customer->inbody = $inbody;
                                $customer->lifestyle = $lifestyle;
                                $customer->payment = $payment;
                                $customer->note = $note;

                                $customer->active = "Neaktívny";
                                $customer->save();


                                Newpass::insert([
                                    'email' => $email,
                                    'token' => Str::random(60),
                                    'created_at' => Carbon::now()
                                ]);
                                //Get the token just created above
                                $tokenData = Newpass::where('email', $email)->latest()->first();

                                if ($this->sendResetEmailCustomer($email, $tokenData->token)) {}

                                return Redirect::to('/zakaznici');

                        }
                      }

  public function delete($id) {

              if(session()->has('admin')) {
                  if ($id == null) {
                      return abort(404);
                  }
                  $user = Admin::find($id);

                  if($id == Session::get('userID')) {
                      return Redirect::to('/admins')->with('showErrorModal', true);
                  }

                  $user->delete();
                  return redirect('/admins');
              } else {
                  return Redirect::to('/');
              }
            }

  public function edit($id) {
    if(session()->has('admin')) {
        $user = Admin::select('*')->where("id", "=", $id)->get()->first();
        $data['user'] = $user;
        return view('user_edit', $data);
        } else {
            return Redirect::to('/');
        }
      }

      public function programy($id) {
        if(session()->has('admin')) {
            $customer = Customer::select('*')->where("id", "=", $id)->get()->first();
            $program = Program::select('*')->where("fk_customer","=", $customer->id)->get();
            $data['customer'] = $customer;
            $data['program'] = $program;
            return view('packages', $data);
            } else {
                return Redirect::to('/');
            }
          }

      public function editcustomer($id) {
        if(session()->has('admin')) {
            $user = Customer::select('*')->where("id", "=", $id)->get()->first();
            $data['customer'] = $user;
            return view('editcustomer', $data);
            } else {
                return Redirect::to('/');
            }
          }

      public function showaddAdmin() {
                if(session()->has('admin')) {
                  return view('newadmin');
                } else {
                    return Redirect::to('/');
                }
          }

          public function showmenu() {
                    if(session()->has('admin')) {
                      return view('menu');
                    } else {
                        return Redirect::to('/');
                    }
              }

              public function upravitprogram($id) {
                        if(session()->has('admin')) {
                          $program = Program::where("id","=",$id)->get()->first();
                          $data['program'] = $program;
                          return view('editprogram', $data);
                        } else {
                            return Redirect::to('/');
                        }
                  }


      public function check_email($email) {
        $user = Admin::where("email","=",$email)->count();
        if($user>=1) {
            return true;
        } else {
            return false;
        }
    }

    public function check_customer_email($email) {
      $user = Customer::where("email","=",$email)->count();
      if($user>=1) {
          return true;
      } else {
          return false;
      }
  }

    public function showaddcustomer(Request $request) {
      if(!session()->has('admin')) {
        return Redirect::to('/');
      }
      else {
        return view('newcustomer');
      }
    }


  public function edit_validator(Request $request) {
  if(!session()->has('admin')) {
   return Redirect::to('/')->withErrors(['status' => 'Relácia skončila, boli ste odhlásený!']);
  }
  else {
        $pw = $request->input('password');
        if(strlen($pw)>0 && strlen($pw) < 8) {
          return Redirect::to('/edit/'.$request->input('id'))->withErrors(['status' => 'Heslo musí obsahovať minimálne 8 znakov.']);
        }

        if(strlen($pw)==0) {
        $user = Admin::where("id","=",$request->input('id'))->first();
        $user->update(["fname" => $request->input('fname'),
            "lname" => $request->input('lname'),
            "email" => $request->input('email')]);
          } else {
            $user = Admin::where("id","=",$request->input('id'))->first();
            $user->update(["fname" => $request->input('fname'),
                "lname" => $request->input('lname'),
                "password" => \Hash::make($request->input('password')),
                "email" => $request->input('email')]);
          }
        return redirect()-> action('App\\Http\\Controllers\HomeController@user_index');

  }
}


} // class
?>
