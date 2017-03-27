<?php
header("Content-Type: text/html; charset=UTF-8"); ?>

    <script type="text/javascript">
    
    function validEmail(email) { 
	
		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if(re.test(email)){
			return true;
		}else{
			return false;
		}
	} 
    
    jQuery(document).ready(function() {
        
        jQuery('#noconsult_mess').text(ok_noconsult);
		
		jQuery('#consult_mail').focus(function(){if(jQuery('#consult_mail').val() == "Ваш E-Mail") jQuery('#consult_mail').val("");});
		jQuery('#consult_name').focus(function(){if(jQuery('#consult_name').val() == "Ваше имя") jQuery('#consult_name').val("");});
                jQuery('#consult_tel').focus(function(){if(jQuery('#consult_tel').val() == "Ваш телефон") jQuery('#consult_tel').val("");});
                jQuery('#consult_text').focus(function(){if(jQuery('#consult_text').val() == "Текст вашего сообщения") jQuery('#consult_text').val("");});
		
		jQuery('#consult_mail').blur(function(){if(jQuery.trim(jQuery('#consult_mail').val()) == "") jQuery('#consult_mail').val("Ваш E-Mail");});
		jQuery('#consult_name').blur(function(){if(jQuery.trim(jQuery('#consult_name').val()) == "") jQuery('#consult_name').val("Ваше имя");});
                jQuery('#consult_tel').blur(function(){if(jQuery.trim(jQuery('#consult_tel').val()) == "") jQuery('#consult_tel').val("Ваш телефон");});
                jQuery('#consult_text').blur(function(){if(jQuery.trim(jQuery('#consult_text').val()) == "") jQuery('#consult_text').val("Текст вашего сообщения");});
                
		
	
		jQuery('#ok_submit').click(function(){
		
			jQuery('.not_filled').each(function(){
				jQuery(this).removeClass('not_filled');
			});
			if(form_email){
			  if(jQuery.trim(jQuery('#consult_mail').val()) == '' || jQuery('#consult_mail').val() == "Ваш E-Mail"){
				jQuery('#consult_mail').focus();
				jQuery('#consult_mail').addClass('not_filled');
				return false;
			  }
			  if(!validEmail(jQuery('#consult_mail').val())){
				
				jQuery('#consult_mail').focus();
				jQuery('#consult_mail').addClass('not_filled');
				return false;
			  } 
			}
			if(form_name){
			  if(jQuery('#consult_name').val()== '' || jQuery('#consult_name').val() == "Ваше имя"){
			
				jQuery('#consult_name').focus();
				jQuery('#consult_name').addClass('not_filled');
				return false;
			  }
			}
			if(form_tell){
			  if(jQuery('#consult_tel').val()== '' || jQuery('#consult_tel').val() == "Ваш телефон"){
				
				jQuery('#consult_tel').focus();
				jQuery('#consult_tel').addClass('not_filled');
				return false;
			  }
			}
          if(jQuery.trim(jQuery("#consult_text").val()) == '' || jQuery("#consult_text").val() == "Текст вашего сообщения"){
            jQuery('#consult_mess').text('Введите текст сообщения');
			jQuery("#consult_text").focus();
			jQuery('#consult_text').addClass('not_filled');
            return false;
          }
         
			//Если все нормально, то отправляем ajax запрос
			
			var email = jQuery.trim(jQuery('#consult_mail').val());
			var name = jQuery.trim(jQuery('#consult_name').val());
			var text = jQuery("#consult_text").val();
			var tell = jQuery("#consult_tel").val();
			
			jQuery('#consult_mess').css('display', 'block');
				jQuery.ajax({
					type: "post",
					url: "http://online-consultant/consultant/class/processing_form.php",
					data: ({email:email, name:name, text:text,  tell:tell}),
                    beforeSend: function(){
                        jQuery('#consult_mess').text("Отправка...");
                    },
					success: function(data){
						jQuery('#consult_mess').text(data);
						
						if(data == "Сообщение успешно отправлено"){
							jQuery("#consult_text").val('');
						}
						
						setTimeout(function(){jQuery('#consult_mess').fadeOut(600);}, 1800);
					}
				})
			
		 
        });
		
		jQuery('#ok_turn_off').click(function(){
			hideChat();
			jQuery('#ok_button').removeClass('ok_chat_show');
		});
    });
    </script>
	
	<style type="text/css">
		
    .nocons{
		position: relative;
		width: 100%;
		height: 355px;
		background: url('http://online-consultant/consultant/images/form_background.png') #777 repeat;
        color: #000;
		box-shadow: 0.2em 0.2em 4px rgba(122, 122, 122, 0.5);

	}
	#ok_consultant{
		box-shadow: none;
		-webkit-box-shadow: none;
	}
	#ok_submit{
		float: right;
		height: 21px;
		margin: 7px 0 0 0;
		padding: 8px 15px;
		cursor: pointer;
		text-align: center;
		color: #FFF;
		font-size: 15px;
		-moz-border-radius: 3px;
		border-radius: 3px;
	}
	
	#pad{
		float: left;
		position: relative;
		padding: 10px;
	}
	#ok_form_img{
		float: left;
		width: 60px;
		height: 73px;
		border: 2px solid #FFF;
		background: url('http://online-consultant/consultant/images/form_cons_img.png') no-repeat;
		box-shadow: 2px 2px 3px #333;
	}
	.ok_form_info{
		float: left;
		width: 100%;
		height: 100px;
	}
    #ok_form_mess{
    	position: relative;
    	float: right;
		width: 225px;
		background: rgb(245, 245, 245);
		box-shadow: 2px 2px 3px #333;
		padding: 8px;
		border-radius: 5px;
		max-height: 73px;
		min-height: 30px;
    }
    #ok_form_mess::before{
	    content: '';
		position: absolute;
		top: 22px;
		left: -4px;
		background: rgb(245, 245, 245);
		height: 9px;
		width: 9px;
		transform: rotate(45deg);
		-moz-transform: rotate(45deg);
		-webkit-transform: rotate(45deg);
		-ms-transform: rotate(45deg);
		-o-transform: rotate(45deg);
	}
    #ok_form_mess p{
        font-size: 12px;
        margin: 0;
        font-family: Arial, sans-serif;
		font-weight: 400;
        color: #333;
        height: auto;
        overflow: hidden;
        max-height: 73px;
    }
    #ok_forma{
    	float: left;
    	width: 100%;
    	margin-top: 0px;
    }
	#consult_mess{
		display: none;
		position: absolute;
		top: 40%;
		left: 50%;
		margin: -35px 0 0 -100px;
		z-index: 1111;
        float: left;
		padding: 15px 0;
		height: auto;
		width: 215px;
		text-align: center;
		color: #FFF;
		font-size: 15px;
		font-family: arial, Helvetica, sans-serif;
		background: #000;
		opacity: 0.8;
		filter:progid:DXImageTransform.Microsoft.Alpha(opacity=80);
		border-radius: 3px;
		box-shadow: 3px 3px 3px rgba(48, 51, 54, 0.7);
	}
	#consultant_web{
		float: right;
	}
	#consultant_web span{
		font-size: 11px;
		color: #292929;
	}
	
    .form_text{
        border: 1px solid #989898;
        border-radius: 4px;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        padding: 4px;
        margin-bottom: 5px;
        width: 188px;
        background-color: #fff;	
    }
	#consult_form{
		position: relative;	
	}
    #consult_form input{
		outline: none;
        color: #555;
        width: 180px;
        font-family: 'Lato', Calibri, Arial, sans-serif;
		text-shadow: 0 1px 0 rgba(255, 255, 255, 0.8);
		border: 1px solid rgb(90, 90, 90);
		font-size: 14px;
		background: #FFF;
		font-weight: 400;
		border-radius: 4px;
		padding: 6px 18px 6px 45px;
		margin-bottom: 7px;
    }
	#consult_form input:focus{
		
	}
	.not_filled{
		box-shadow: 0px 0px 7px #DA1E1E !important;
		border: 1px solid #AA0606 !important;
	}
	.img_class{
		display: block;
		position: absolute;
		height: 30px;
		width: 36px;
		top: 1px;
		left: 0;
		background-color: #C0C0C0;
		border-bottom-left-radius: 4px;
		border-top-left-radius: 4px;
	    background: url('http://online-consultant/consultant/images/gradient-form.png') 0 0 repeat-x;
	}
    .img_class img{
    	border: none;
    	margin-left: 2px;
		margin-top: -1px;
    	width: 32px;
    	height: 32px;
    }
    #consult_text{
        width: 298px;
        height: 55px;
        outline: none;
        padding: 5px;
        color: #5F676E;
		font-family: 'Lato', Calibri, Arial, sans-serif;
		text-shadow: 0 1px 0 rgba(255, 255, 255, 0.8);
		box-shadow: inset 2px 2px 6px #EBEBEB;
		border: 1px solid #DBD9D9;
		font-size: 13px;
		font-weight: 400;
		border-radius: 4px;
		padding: 10px;
		resize: none;
		overflow: auto;
    }
	
	.ok_field{
		position: relative;
	}
	#ok_close_chat{
		position: static;
		float: right;
		height: 20px;
		margin-right: 10px;
		width: auto;
		margin-top: 20px;
		cursor: pointer;
	
	}
	#ok_turn_off{
		float: left;
		color: #FFF;
		font-size: 15px;
		text-decoration: underline;
		line-height: 16px;
	}
	#ok_turn_off:hover{
		
	}
	</style>
	
<div class="nocons">
<div id="consult_mess">Отправка...</div>
<div id="pad">
	<div class="ok_form_info">
		<div id="ok_form_img">
		</div>
		<div id="ok_form_mess">
			<p id="noconsult_mess"></p>
		</div>
		</div>
	<div id="ok_forma">
		<form id="consult_form" action="form.php" method="post">
		<div class="ok_field"><input id="consult_mail" type="text" name="sendform_mail" value="Ваш E-Mail" /><span class="img_class" id="ok_email"><img src="http://online-consultant/consultant/images/web.png" /></span></div>
		
		<div class="ok_field"><input id="consult_name" type="text" name="sendform_name" value="Ваше имя" /><span class="img_class" id="ok_name"><img src="http://online-consultant/consultant/images/user.png" /></span></div>
	   
		<div class="ok_field"><input id="consult_tel" type="text" name="sendform_tell" value="Ваш телефон" /><span class="img_class" id="ok_tel"><img src="http://online-consultant/consultant/images/mobile.png" /></span></div>
	 
		
		<textarea id="consult_text" name="sendform_text">Текст вашего сообщения</textarea>
		
		<div id="ok_submit" class="ok_button button-green">Отправить</div>
		<div id="ok_close_chat">
			<div id="ok_turn_off">Закрыть окно</div>
		</div>
		
	</div>
</div>
</div>