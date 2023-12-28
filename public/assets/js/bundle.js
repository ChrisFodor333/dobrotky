/*

 - cache/dataProtection.protector.2e7cf440ab6b.min.js
 - cache/best-practice.f11544b9ddfd.min.js
 - cache/google.reCaptcha.e4c46126240a.min.js

*/


/* minified the hell out of this */

;(function($,global,document,undefined){$(function(){$('nj-protected').each(function(){let $this=$(this);switch($this.data().type){case'emailAddress':let $button=$('<button>',{'class':'btn btn-light btn-sm protected-data-show','data-uuid':$this.data().uuid,'data-type':$this.data().type});$this.after($button.append($('<i class="fa fa-at">')));break;}});$(document).on('click','.protected-data-show',function(e){let uuids=$.map($('.protected-data-show'),function(item){return $(item).data().uuid;});$(document.body).one('reCaptchaCallenge',function(e,token){$.post('/data-protection/home/unprotect.json',{gRecaptchaResponse:token,uniqueIds:uuids},function(response){response.forEach(function(item){let $button=$(`.protected-data-show[data-uuid="${item.uuid}"]`),$element;switch($button.data().type){case'emailAddress':$element=$(`<a href="mailto:${item.value}">${item.value}</a>`);break;}
$button.replaceWith($element);});});});if(window.grecaptcha){grecaptcha.execute();}else{bootbox.alert('CAPTCHA validation is not available');}});});})(jQuery,this,document);;(function($,global,document,undefined){'use strict';var $selects=$('select.tagSelect');var $resultContainer=$('#bestPracticeTeasers');var $resultItems=$('#bestPracticeTeasers .item');var $modal=$('#bestPracticeModal');var hash=document.location.hash;if($selects.length){$selects.each(function(){$(this).change(function(){$resultContainer.find('.item.'+$(this).val()).removeClass('hide');$resultContainer.find('.item.'+$(this).val()).addClass('show');$resultContainer.find('.item:not([class *='+$(this).val()+'])').addClass('hide');$resultContainer.find('.item:not([class *='+$(this).val()+'])').removeClass('show');})})}
var openModal=function(title){var modalContent=title.replace('#','');var template=document.querySelector('template[name = '+modalContent+']');if(template){$modal.find('.modal-body .best-practice-desc').remove();$modal.find('.modal-body').append(template.content.cloneNode(true))
$modal.modal('show');}}
$resultItems.click(function(e){openModal($(this).attr('href'));})
if(hash){openModal(hash);}})(jQuery,this,window.document);;(function($,global,document,undefined){$(function(){var grecaptcha=global.grecaptcha||false;var submit=function($form,token){let data=$form.serialize()+`&gRecaptchaResponse=${token}`;$form.trigger('submitting',data);$.ajax({url:$form.attr('action')+'.json',method:$form.attr('method')||'POST',data:data,success:function(response){$form.trigger('submitted',[response]);},error:function(jqXHR,textStatus,errorThrown){$form.trigger('error',[jqXHR,textStatus,errorThrown]);let message=jqXHR.responseJSON&&jqXHR.responseJSON.message?jqXHR.responseJSON.message:'The request could not be completed';(global.bootbox||global).alert(message);}});};if(grecaptcha){$(document.body).on('submit','form[data-captcha]',function(e){var $form=$(this);if($form.data().captcha){e.preventDefault();$(document.body).one('reCaptchaCallenge',function(e,token){submit($form,token);grecaptcha.reset();});grecaptcha.execute();}});}});})(jQuery,window,document);
