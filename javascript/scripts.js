var baseurl="http://78.46.117.226/education";
 


      function success () {
        notie.alert({ type: 1, text: 'Success!', time: 2 })
      }
	   function cartclearmsg () {
        notie.alert({ type: 1, text: 'Cart cleared !', time: 2 })
		
		setTimeout(function(){ window.location.href='cart.php'; }, 1000);
		
      }
	    function addtocartmsg () {
        notie.alert({ type: 1, text: 'Added to cart!', time: 2 })
      }

      function warning () {
        notie.alert({ type: 2, text: 'Warning<br><b>with</b><br><i>HTML</i><br><u>included.</u>', time: 2 })
      }

      function error () {
        notie.alert({ type: 3, text: 'Error.', time: 2 })
      }

      function info () {
        notie.alert({ type: 4, text: 'Information.', time: 2 })
      }

      function force () {
        notie.force({
          type: 3,
          text: 'You cannot do that, sending you back.',
          buttonText: 'OK',
          callback: function () {
            notie.alert({ type: 3, text: 'Maybe when you\'re older...' })
          }
        })
      }

      function confirms () {
        notie.confirm({
          text: 'Are you sure you want to do that?<br><b>That\'s a bold move...</b>',
          cancelCallback: function () {
            notie.alert({ type: 3, text: 'Aw, why not? :(', time: 2 })
          },
          submitCallback: function () {
            notie.alert({ type: 1, text: 'Good choice! :D', time: 2 })
          }
        })
      }

      function input() {
        notie.input({
          text: 'Please enter your email address:',
          cancelCallback: function (value) {
            notie.alert({ type: 3, text: 'You cancelled with this value: ' + value, time: 2 })
          },
          submitCallback: function (value) {
              notie.alert({ type: 1, text: 'You entered: ' + value, time: 2 })
          },
          type: 'text',
          placeholder: 'name@example.com',
          spellcheck: 'false'
        })
      }

      function select() {
        notie.select({
          text: 'Demo item #1, owner is Jane Smith',
          cancelText: 'Close',
          cancelCallback: function () {
            notie.alert({ type: 5, text: 'Cancel!' })
          },
          choices: [
            {
              text: 'Share',
              handler: function () {
                notie.alert({ type: 1, text: 'Share item!' })
              }
            },
            {
              text: 'Open',
              handler: function () {
                notie.alert({ type: 1, text: 'Open item!' })
              }
            },
            {
              type: 2,
              text: 'Edit',
              handler: function () {
                notie.alert({ type: 2, text: 'Edit item!' })
              }
            },
            {
              type: 3,
              text: 'Delete',
              handler: function () {
                notie.alert({ type: 3, text: 'Delete item!' })
              }
            }
          ]
        })
      }

      function date() {
        notie.date({
          value: new Date(2015, 8, 27),
          cancelCallback: function (date) {
            notie.alert({ type: 3, text: 'You cancelled: ' + date.toISOString() })
          },
          submitCallback: function (date) {
            notie.alert({ type: 1, text: 'You selected: ' + date.toISOString() })
          }
        })
      }
 

function checksession()
{
	
	
	//hidden_uid=document.getElementById('hidden_uid').value;
	
	$('#sign-up-modal').modal('show');
}

function updateStatus(id,table,status){
	

 var xmlHttpReq = false;

    if (window.XMLHttpRequest)

	 {

        xmlHttpReq = new XMLHttpRequest();

    }

    else if (window.ActiveXObject)

	 {

        xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");

    }

	

	xmlHttpReq.onreadystatechange = function()

      {

		 if (xmlHttpReq.readyState == 4)

	   {    

		     response=xmlHttpReq.responseText;
			 var splitText=response.split("###");

			 var result=splitText[0];

			 var msg=splitText[1];
//alert(response);
			 if(result=='1'){

			 document.getElementById('check'+id).checked= true;	 

			 }

			 document.getElementById('status'+id).innerHTML= msg;

			}else{

			 document.getElementById('status'+id).innerHTML='<img src="'+baseurl+'/images/loading.gif">'  

		   }

			}

	 xmlHttpReq.open('GET',baseurl+'/ajaxCallToPhp/updatestatus.php?id='+id+'&table='+table+'&status='+status, true);

	 xmlHttpReq.send(null); 	

}





function isNumberKey(evt)     
     {
var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
        
{ 
  return false;}
else{
            
return true;

}}
(this.value)


	
		
	$(function(){
		
		
 	jQuery.validator.addMethod("calendar", function(value, element)
{
return this.optional(element) || /^(\d{4})(-)(\d{2})(-)(\d{2})$/i.test(value);
}, "Enter correct format");

	
		jQuery.validator.addMethod("aboutpat", function(value, element)
{
return this.optional(element) || /^[-a-zA-Z-0-9()<\/>%_@.#&+,-v'":;]+(\s+[-a-zA-Z-0-9:;%'"<\/>_@.#&+,-v]+)*$/i.test(value);
}, "Accepts letters,digits and special characters only");

		jQuery.validator.addMethod("addresspat", function(value, element)
{
return this.optional(element) || /^[-a-zA-Z-0-9()_@.#&+,-v]+(\s+[-a-zA-Z-0-9()_@.#&+,-v]+)*$/i.test(value);
}, "Accepts letters,digits and special characters only");

jQuery.validator.addMethod("alls", function(value, element)
{
return this.optional(element) ||  /.*[^ ].*$/i.test(value);
}, "Invalid characters ");
     jQuery.validator.addMethod("websitepat", function(value, element)
{
return this.optional(element) || /^(https?\:\/\/)?((www\.)?youtube\.com|youtu\.?be)\/.+$/i.test(value);
}, "Enter correct youtube link");
 jQuery.validator.addMethod("lettersonlynew", function(value, element) 
{
return this.optional(element) || /^[a-zA-Z-v]+(\s+[a-zA-v]+)*$/i.test(value);
}, "Accepts letters only");
jQuery.validator.addMethod("newmobile", function(value, element) 
{
return this.optional(element) || /^[0-9]{9,13}$/i.test(value);
}, "Please enter correct mobile number");
jQuery.validator.addMethod("mobilenumber", function(value, element) 
{
return this.optional(element) || /^[6789]\d{9}$/i.test(value);
}, "Please enter correct mobile number");
jQuery.validator.addMethod("project", function(value, element) 
{
return this.optional(element) || /[0-9]$/i.test(value);
}, "Please enter correct mobile number");
jQuery.validator.addMethod("emailcode", function(value, element) 
{
return this.optional(element) || /^[a-z0-9]+[a-z0-9\._]*@[a-z0-9\.]+\.[a-z]{2,3}$/i.test(value);
}, "Enter valid email address");
 jQuery.validator.addMethod("lettersonly", function(value, element) 
{
return this.optional(element) || /^[-a-zA-Z-v]+(\s+[-a-zA-v]+)*$/i.test(value);
}, "Accepts letters only");
	
	
jQuery.validator.addMethod("filepat", function(value, element) 
{
return this.optional(element) || /^([a-zA-Z0-9\s_\\.\-:])+(.pdf)$/i.test(value);
}, "Only pdf format");

jQuery.validator.addMethod("imagepatt", function(value, element) 
{
return this.optional(element) || /^([a-zA-Z0-9\s_\\.\-:])+(.png|.jpeg|.jpg)$/i.test(value);
}, "Supports jpeg,jpg,png");
	jQuery.validator.addMethod("passport", function(value, element) 
{
return this.optional(element) || /^[A-PR-WY][1-9]\d\s?\d{4}[1-9]$/i.test(value);
}, "Enter valid passport number");



jQuery.validator.addMethod('ckrequired', function (value, element, params) { 
var idname = jQuery(element).attr('id'); 
var messageLength =  jQuery.trim ( CKEDITOR.instances['testimonial'].getData() ); 
return messageLength.length !== 0; 
}, "Image field is required"); 


$("#question_forms").validate({
  
    
            rules: {
               
				difficulty:{
				required:true,       
                },
				questions:{
                         required: function(textarea) 
                        {   CKEDITOR.instances.q1.updateElement(); // update textarea
          var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
		 
		  
          return editorcontent.length == 0;},

                 // alls:true       
                    },
				
			option1:{
                         required: function(textarea) 
                        {   CKEDITOR.instances.option1.updateElement(); // update textarea
          var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
		 
		  
          return editorcontent.length == 0;},

                  alls:true       
                    },
				option2:{
                         required: function(textarea) 
                        {   CKEDITOR.instances.option2.updateElement(); // update textarea
          var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
		 
		  
          return editorcontent.length == 0;},

                  alls:true       
                    },
				option3:{
                         required: function(textarea) 
                        {   CKEDITOR.instances.option3.updateElement(); // update textarea
          var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
		 
		  
          return editorcontent.length == 0;},

                  alls:true       
                    },option4:{
                         required: function(textarea) 
                        {   CKEDITOR.instances.option4.updateElement(); // update textarea
          var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
		 
		  
          return editorcontent.length == 0;},

                  alls:true       
                    },
					correctans:{
					required:true, 	
						
					}
				},
			  messages: { 
    } ,
				
				
				
			
			
	});
	
$(".topic_form").validate({

                rules: {
               
				name:{
				required:true,       
				alls:true,
                },
					topic:{
				required: true,
				alls:true,      
                },
				   
				difficulty:{
				required: true,
                },
				   
				},
			  messages: { 
            "names[]": "Please select at least one user.",
			topic:"Topic name can't be blank"
    } 
				
				
				
			
			
	})
	

	

 

$("#toform").validate({

                rules: {
               
				topic:{
				required:true,       
				alls:true,
                },
				
				difficulty:{
				required: true,
                },
				   
				},
			  messages: { 
    } 
				
				
				
			
			  
	})
	
	
	

$("#question_forms2").validate({
 ignore:[],
                rules: {
               
				difficulty:{
				required:true,       
                },
				questions:{
                         required: function(textarea) 
                        {   CKEDITOR.instances.question.updateElement(); // update textarea
          var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
		 
		  
          return editorcontent.length == 0;},

                //  alls:true       
                    },
				
			
				},
			  messages: { 
    } ,
				
				
				
			
			
	})
	


	$("#choose_sub").validate({

                rules: {
               
				level:{
				required:true,       
                },
					subjectid:{
				required: true,
      
                },
				
				
				
				},
			  messages: { 
    } ,
				
				
	    submitHandler: gotoquesdiv
			
			
			
	})
	
		$("#choose_subview").validate({

                rules: {
               
				level:{
				required:true,       
                },
					subjectid:{
				required: true,
      
                },
				
				
				
				},
			  messages: { 
    } ,
				
				
	    submitHandler: gotoquesviewdiv
			
			
			
	})
$("#choose_level").validate({

                rules: {
               
				level:{
				required:true,       
                },
					subjectid:{
				required: true,
      
                },
				
				
				
				},
			  messages: { 
    } ,
				
				
	    submitHandler: gotolevel
			
			
			
	})

function gotolevel(){
		val=document.getElementById('level').value
		
	subject=document.getElementById('hiddenvalue').value;
		
		
		window.location.href='add_topics.php?id='+btoa(subject)

	}


function gotoquesdiv(){
		val=document.getElementById('level').value
		 
	subject=document.getElementById('subjectid').value;
	topic=document.getElementById('hiddenvalue').value;
		
		
		window.location.href='viewtopics.php?id='+btoa(topic)+'&aid='+btoa(subject); 

	}



function gotoquesviewdiv(){
		val=document.getElementById('level').value
		 
	subject=document.getElementById('subjectid').value;
	topic=document.getElementById('hiddenvalue').value;
		
		
		window.location.href='viewotopics.php?id='+btoa(topic)+'&aid='+btoa(subject); 

	}
	
	
	$("#subadmin").validate({

                rules: {
                
				
				username:{
				required: true,
				lettersonly: true
      
                },
				password:{
				required: true,
				minlength:6      
                },
				
				
				      },
			
				
				
		
			
	})
	$("#step1").validate({
	//alert(cal);
                rules: {
                
				username:{
				required: true,      
                },
				}
		})

	
$("#registerform").validate({
	//alert(cal);
                rules: {
                
					name:
				{
				required: true,
				addresspat: true,
                },
				
				userlocation:
				{
				required: true,
				addresspat: true,
                },
				email:
				{
				required: true,
				emailcode: true,
                },
				
				phone:
				{
				required: true,
				newmobile: true,
                },
				password:
				{
				required: true,
				minlength:6,      
				addresspat: true,
                },
				
					        },
			
    submitHandler: submitadminForm
			
	})
	
	
	
	
	$("#change_pass").validate({
	//alert(cal);
                rules: {
                
				password:{
				required: true,
				minlength:6,      
				addresspat: true,
                },
				
				
				cpassword:
				{
				required: true,
				minlength:6,      
				equalTo: "#password"

                },
				
					        },
			
    submitHandler: change_password
			
	})
	$("#login_form").validate({
	//alert(cal);
                rules: {
                
				lemail:
				{
				required: true,
				emailcode: true,
                },
				
				
				lpassword:
				{
				required: true,
				minlength:6,      
				addresspat: true,
                },
				
					        },
			
    submitHandler: loginform
			
	})
	
	
	$("#forgetform").validate({

                rules: {
                
				femail:
				{
				required: true,
				emailcode: true,
                },
				
				
				
				
					        },
			    
submitHandler: forgetpassword
			
	})
	
	$("#registration_form").validate({

                rules: {
                
				r_email:
				{
				required: true,
				emailcode: true,
                },
				r_password:
				{
				required: true,
				addresspat: true,
                },
				r_cpassword:
				{
				required: true,
				addresspat: true,
			equalTo: "#r_password"

                },
				defaultCheck2:
				{
				required: true,
				},
	//	submitHandler: registerstudent
	
				
					        },
			
submitHandler: registerstudent
			
	})	
	
	
	
	
	$("#bannerform").validate({
	//alert(cal);
                rules: {
                
				image:
				{
				required: true,
				imagepatt: true,
                },
				image1:
				{
				
				imagepatt: true,
                }
				     },
	
	})
	
	
	
	
	
	$("#testimonialform").validate({
	ignore:[],
                rules: {
                
				
				testimonial:
				{
                         required: function(textarea) 
                        {   CKEDITOR.instances.editor1.updateElement(); // update textarea
          var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
		  
          return editorcontent.length == 0;},

                  alls:true       
                    },
				postedby:{
				required: true,
                  alls:true       
                },
				 },
			
	})
	
	
	
	
	
	
	$("#createminitest").validate({
	//alert(cal);
                rules: {
                
				subject: {
					required: true,
				},
				timings: {
					required: true,
				 number: true

				},
				questions: {
					required: true,
					      number: true

				},
				
				
					        },
							
	
	})
	
	
	
	$("#passform").validate({
	//alert(cal);
                rules: {
                
				name: {
					required: true,
					minlength: 6
				},
				email: {
					required: true,
					minlength: 6,
					equalTo: "#name"
				}
				
				
					        },
							
	
	})
	
	$("#pimagesform").validate({
	//alert(cal);
                rules: {
                
				
				image:
				{
				required: true,
				imagepatt: true,
                },
				image1:
				{
				
				imagepatt: true,
                }
				
				
				
					        },
			
	})
	
	
	$("#checkout_form").validate({
	//alert(cal);
                rules: {
                
				
				fname:
				{
				required: true,
				lettersonly: true,
                },
				lname:
				{
				required: true,
				lettersonly: true,
                },
				company:
				{
				required: true,
				addresspat: true,
                },
				company:
				{
				required: true,
				addresspat: true,
                },
				streetadd:
				{
				required: true,
				addresspat: true,
                },
				city:
				{
				required: true,
				addresspat: true,
                },
				province:
				{
				required: true,
                },
				country:
				{
				required: true,
                },
				postal:
				{
				required: true,
		        number: true,

                },
				phone:
				{
				required: true,
		        number: true,

                },
				
				
					        },
							
			    submitHandler: checkout_process
	
	})
	
	
	});
	
	function registerstudent()
	{
		
	
		
		
	
	
	 var data = $("#registration_form").serialize();
	
		email=$("#r_email").val();
			
				password=$("#r_password").val();
					default_level=$("#default_level").val();
//trial=$("#default_level").val();
trial=1;	
	landing_type=$("#landing_type").val();
///alert(landing_type);
	$.ajax({
        type: "POST",
		dataType:'json',
        url: baseurl+"/ajaxCallToPhp/registration.php",
        data: { 
        	email:email,
			level:default_level,
			password:password,
		trial:trial
			
        },
        success: function(result) {
			
        if(result.status==1)
		 {
			 if(landing_type==1)
			{
					window.location.href='checkout.php';
	
				
			}   
			else
			{
window.location.href=baseurl+"/web-app.php";

			}}  
		  
        if(result.status==2)
		 {
			 
			 
alert("Already registered");

		  }  
		 else 		          if(result.status==0)


		 {
			document.getElementById('pagetitle').innerHTML="Some problem has occurred";
	
		 }
		 
        },
        error: function(result) {
            
        }
    });

		
		
		
		
		
		
	}
	
	function change_password()
	{
		
	
		
		
	
	
	 var data = $("#change_pass").serialize();
	
		password=$("#password").val();
			hidden_id=$("#hidden_id").val();
		//alert(email);
	
	
	$.ajax({
        type: "POST",
		dataType:'json',
        url: baseurl+"/ajaxCallToPhp/changepassword.php",
        data: { 
        	password:password,
		uid:hidden_id
			
        },
        success: function(result) {
			
						 document.getElementById('detailsnew').style.display='none';

			
        if(result==1)
		 {
		
			 document.getElementById('pagetitlenew').innerHTML="Your password has been changed successfully!!";


		  }  
		  
		 		  if(result==0)

		 {
			 document.getElementById('pagetitlenew').innerHTML="Some error has occurred!!";
	
		 }
		 
        },
        error: function(result) {
            
        }
    });

		
		
		
		
		
	}
	function forgetpassword()
	{
		
		
	
	
	 var data = $("#forgetform").serialize();
	
		email=$("#femail").val();
			
		alert(email);
	
	
	$.ajax({
        type: "POST",
		dataType:'json',
        url: baseurl+"/ajaxCallToPhp/forgetpassword.php",
        data: { 
        	email:email,
		
			
        },
        success: function(result) {
			
			
			
			
			document.getElementById('details').style.display='none';
        if(result==1)
		 {
			 
			 
			 document.getElementById('pagetitle').style.display="block";


		  }  
		  
		  if(result==2)
		 {
			 
			 
			 document.getElementById('pagetitle').innerHTML="You are not a registered user";


		  }  
		 else 		  if(result==0)

		 {
			document.getElementById('pagetitle').innerHTML="Some problem has occurred";
	
		 }
		 
        },
        error: function(result) {
            
        }
    });

		
		
		
	}
	
	function submitadminForm()
	
	{
		
		
    var data = $("#registerform").serialize();
	
	//username=$("#username"-url).val();
	var throw_url=$("#actual_url").val();
	password=$("#password").val();
		name=$("#name").val();
				mobile=$("#phone").val();
				email=$("#reg_email").val();
userlocation=$("#userlocation").val();

	$.ajax({
        type: "POST",
		dataType:'json',
        url: baseurl+"/ajaxCallToPhp/register.php",
        data: { 
            password: password,
			name:name,
			mobile:mobile,
			email:email,
			userlocation:userlocation

        },
        success: function(result) {
			
        if(result.status==1)
		 {
			// url=baseurl+"/index.php";
		window.location.href=throw_url;

		  }
		 else
		 {
			  alert("Email-id already exist");
	
		 }
		 
        },
        error: function(result) {
            
        }
    });

		
		
		}
		
		
		
		function loginform()
	
	{
		
		 
    var data = $("#login_form").serialize();
	
	//username=$("#username").val();
		var throw_url=$("#actual_url").val();
	password=$("#lpassword").val();
				email=$("#lemail").val();

landing_type=$("#landing_type").val();
	$.ajax({
        type: "POST",
		dataType:'json',
        url: baseurl+"/ajaxCallToPhp/frontlogin.php",
        data: { 
            password: password,
			email:email,
			//landing_type:landing_type
			
        },
        success: function(result) {

        if(result.status==1)
		 {
			// url=baseurl+"/index.php";
			if(landing_type==1)
			{
					window.location.href='checkout.php';
	
				
			}
			else
			{
		window.location.href='welcome.php';
			}
		  }
		 else
		 {
			  alert("wrong credentials");
	
		 }
		 
        },
        error: function(result) {
            
        }
    });

		
		
		}

function submitcontactform()

{
	
	
	 var data = $("#contactformmain").serialize();
	
	fullname=$("#fullname").val();
		email=$("#contcatemail").val();
			subject=$("#subject").val();	
			phone=$("#phone").val();
		message=$("#message").val();
	
	
	
	$.ajax({
        type: "POST",
		dataType:'json',
        url: baseurl+"/ajaxCallToPhp/submitcontact.php",
        data: { 
            fullname: fullname, 
        	email:email,
			subject:subject,	
			phone:phone,
		message:message
			
        },
        success: function(result) {
			
        if(result.status==1)
		 {
			$('#contactsuccess').modal('show');

		  }
		 else
		 {
			$('#contactfailed').modal('show');
	
		 }
		 
        },
        error: function(result) {
            
        }
    });
}

function submitsubscribeForm()

{

 var data = $("#subscribeform").serialize();
	
	username=$("#subemail").val();
	
	
	
	$.ajax({
        type: "POST",
		dataType:'json',
        url: baseurl+"/ajaxCallToPhp/newsletter.php",
        data: { 
            username: username, 
            
			
        },
        success: function(result) {
			
        if(result.status==1)
		 {
			$('#success').modal('show');

		  }
		 else
		 {
			$('#failed').modal('show');
	
		 }
		 
        },
        error: function(result) {
            
        }
    });
	}


function submitpropertyform()
{

 var data = $("#propertyform").serialize();
	
	propname=$("#propname").val();
	propid=$("#propid").val();
	propphone=$("#propphone").val();
	propemail=$("#propemail").val();
	propmsg=$("#propmsg").val();
	
	
	$.ajax({
        type: "POST",
		dataType:'json',
        url: baseurl+"/ajaxCallToPhp/propertylist.php",
        data: { 
            propname: propname, 
			propid: propid, 
			propphone: propphone, 
			propemail: propemail,
			propmsg:propmsg 
			
            
			
        },
        success: function(result) {
			
        if(result.status==1)
		 {
			$('#contactsuccess').modal('show');

		  }
		 else
		 {
			$('#contactfailed').modal('show');
	
		 }
		 
        },
        error: function(result) {
            
        }
    });
		

}

function showsubjects_1(val)
{
	
	

 var data = $("#choose_sub").serialize();
	
	
	
	
	$.ajax({
        type: "POST",
		dataType:'json',
        url: baseurl+"/ajaxCallToPhp/showsubjects.php",
        data: { 
            id: val, 
		
        },
        success: function(result) {
			
        if(result.status==1)
		 {
//alert(result);
		$("#selectsubject").html(result);
		  }
		 else
		 {
	
		 }
		 
        },
        error: function(result) {
            
        }
    });
		


	
}

function showsubjects(val)
{
	
 var xmlHttpReq = false;

    if (window.XMLHttpRequest)

	 {

        xmlHttpReq = new XMLHttpRequest();

    }

    else if (window.ActiveXObject)

	 {

        xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");

    }

	

	xmlHttpReq.onreadystatechange = function()

      {

		 if (xmlHttpReq.readyState == 4)

	   {    

		     response=xmlHttpReq.responseText;
			  document.getElementById('loaderid').innerHTML="";
document.getElementById('selectsubject').innerHTML=response;
			 
		}else{
			 document.getElementById('loaderid').innerHTML='<img src="'+baseurl+'/images/loader.gif">'  

//document.getElementById('selectsubject').innerHTML="Loading";
		   }

			}

	 xmlHttpReq.open('GET',baseurl+'/ajaxCallToPhp/showsubjects.php?id='+val, true);

	 xmlHttpReq.send(null); 	

}

function setval(val)
{
	document.getElementById('hiddenvalue').value=val;
	
	
}





function frontselecttopic(type,val)
{
			searchtitle=document.getElementById('searchtitle').value;
if(type==5)
{
	
	var subject=document.getElementById('subjectid').value;
    var level = $('.level:checked').val();
	

subtypid=document.getElementById('subtypid').value;	
    var status = $('.status:checked').val();


 

}
if(type==1)
{
	
var subject=val;
    var level = $('.level:checked').val();
	

subtypid=document.getElementById('subtypid').value;	
    var status = $('.status:checked').val();


 

}
if(type==2)
{
	
var subtypid=val;
	var subject=document.getElementById('subjectid').value;
    var level = $('.level:checked').val();
    var status = $('.status:checked').val();


}
if(type==3)
{
	
var status=val;
	var subject=document.getElementById('subjectid').value;
    var level = $('.level:checked').val();
subtypid=document.getElementById('subtypid').value;



}

if(type==4)
{
	
var level=val;
	var subject=document.getElementById('subjectid').value;
subtypid=document.getElementById('subtypid').value;	
    var status = $('.status:checked').val();

 

}



	document.getElementById('all_topic_div').innerHTML='';

 var xmlHttpReq = false;

    if (window.XMLHttpRequest)

	 {

        xmlHttpReq = new XMLHttpRequest();

    }

    else if (window.ActiveXObject)

	 {

        xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");

    }

	

	xmlHttpReq.onreadystatechange = function()

      {

		 if (xmlHttpReq.readyState == 4)

	   {    

		     response=xmlHttpReq.responseText;
			 
			 			 var splitText=response.split("##");
						

			//  document.getElementById('topicloaderid').innerHTML="";
document.getElementById('selectsubtype').innerHTML=splitText[0];
		 document.getElementById('loaders').innerHTML=''  
   
document.getElementById('all_topic_div').innerHTML=splitText[1];

			 
		}else{

		 document.getElementById('loaders').innerHTML='<img src="'+baseurl+'/images/loader.gif">'  
		   }

			}

	 xmlHttpReq.open('GET',baseurl+'/ajaxCallToPhp/front_topics.php?subject='+subject+'&subtypid='+subtypid+'&level='+level+'&status='+status+'&searchtitle='+searchtitle, true);     

	 xmlHttpReq.send(null); 	


	
	
	
}

function settextvalue(val)
{
	textval=document.getElementById('textbox'+val).value;

document.getElementById("Ans"+val).value=textval; 	
	
}

function selecttopic(val)
{

			document.getElementById('hiddenvalue').value='';

	
 var xmlHttpReq = false;

    if (window.XMLHttpRequest)

	 {

        xmlHttpReq = new XMLHttpRequest();

    }

    else if (window.ActiveXObject)

	 {

        xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");

    }

	

	xmlHttpReq.onreadystatechange = function()

      {

		 if (xmlHttpReq.readyState == 4)

	   {    

		     response=xmlHttpReq.responseText;
			  document.getElementById('topicloaderid').innerHTML="";
document.getElementById('selectsubtype').innerHTML=response;
			 
		}else{

			 document.getElementById('topicloaderid').innerHTML='<img src="'+baseurl+'/images/loader.gif">'  
		   }

			}

	 xmlHttpReq.open('GET',baseurl+'/ajaxCallToPhp/selecttopic.php?id='+val, true);     

	 xmlHttpReq.send(null); 	


	
	
	
}
function choosesubject(val)
{
	

 var xmlHttpReq = false;

    if (window.XMLHttpRequest)

	 {

        xmlHttpReq = new XMLHttpRequest();

    }

    else if (window.ActiveXObject)

	 {

        xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");

    }

	

	xmlHttpReq.onreadystatechange = function()

      {

		 if (xmlHttpReq.readyState == 4)

	   {    

		     response=xmlHttpReq.responseText;
			 document.getElementById('loaderid').innerHTML="";
document.getElementById('selectsubject').innerHTML=response;
			 
		}else{
			 document.getElementById('loaderid').innerHTML='<img src="'+baseurl+'/images/loader.gif">'  

		   }

			}

	 xmlHttpReq.open('GET',baseurl+'/ajaxCallToPhp/choosesubject.php?id='+val, true);     

	 xmlHttpReq.send(null); 	


	
	
}


function chooselevelandRegister(level)
{
	$('#default_level').val(level);
	$('#exampleModalLong2').modal('show');
	
	
	
	
}

function setvalue()
{
	
	if($('#defaultCheck2').prop('checked'))
	{ 

	 $('#defaultCheck2').val('1');           
	}
	else
	{
			 $('#defaultCheck2').val();           

		
	}
	
}



function setanswer(option,qid)
{
	document.getElementById('Ans'+qid).value=option
	 
}



function addtocart(levelid,packageid)
{
	    

          $.ajax({
            type: 'post',
            url: 'ajaxCallToPhp/cartsession.php',
   data: { 
        	levelid:levelid,
			packageid:packageid,
 		
			
        },            success: function (result) {
			if(result.cart>0)
			{
				cartval=result.cart;
				
		$('#cart_count').html(cartval);	
			
addtocartmsg();			}
            }
          });

       
	
	
	
	
}

function showdiv(tid,lid)
{
	
	alert();
	    

          $.ajax({
            type: 'post',
            url: 'ajaxCallToPhp/loadresult.php',
   data: { 
        	id:lid,
			test:tid,
 		
			
        },            success: function (result) {
			      google.charts.setOnLoadCallback(drawChart);

			
			$("#myresult").html(result);
            }
          });

       
	
	
	
	

	
	
	
}

function incrementqty(type,pid,lid)
{

	cartvalue=$('#P'+pid).val();
	
	if(type==1)
	{
	var newcartvalue=parseInt(cartvalue)+1;  
	}
	
	else
	{
		var newcartvalue=parseInt(cartvalue)-1;  
	
		
	}
	if(newcartvalue<=0)
	{
		
alert("Cart quantity cannot be less than 1");	
		return false;
	}

          $.ajax({
            type: 'post',
            url: 'ajaxCallToPhp/updateqty.php',
   data: { 
        	levelid:lid,
			packageid:pid,
			cartvalue:newcartvalue,
 		type:type
			
        },            success: function (result) {
			if(result.status==1)
			{
					$('#P'+pid).val(newcartvalue);


				subp="$"+result.price;
									$('#sub'+pid).html(subp);
									$('#sub_total').html("$"+result.subtotal);

				
				
			}
            }
          });

       
	
	
	
	
	
	
	
}
function submitform()
{   


 $('form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'post.php',
            data: $('form').serialize(),
            success: function () {
              alert('form was submitted');
            }
          });

        });}
	function setValue(val){
		$('#hidId').val(val)
	}	
	function checkout_process()
	{
		

	   $('#checkbtn').prop('disabled', true);



          $.ajax({
            type: 'post', 
            url: 'checkoutprocess.php',
            data: $('form').serialize(),
            success: function (result) {
window.location.href='thankyou.php';        
    } 
          });

      
		 
		
	}
		function redirection_page()
		{
		
		$('#trial').val(1)
			
	var user_id=$('#user_session').val();
	
	 if(user_id=="")
	 {
		 
	$('#exampleModalLong2').modal('show');
		 
		 
	 }
	 	
		else
		{
			
			alert("Failed to create your account:You are already logged in !!!");
			
			
		}
			
			
		}
		
		
		
		function clearcart()
		{
			
			  $.ajax({
            type: 'post',
            url: 'clear.php',
            data: $('form').serialize(),
            success: function () {
cartclearmsg();




            }
          });
			
			         
			
			
		}
		
		function checkout()
		{
			
			
			$("#landing_type").val(1);
			var user_id=$('#user_session').val();
			
			if(user_id=='')
			{
				
				$('#exampleModalLongs').modal('show');
	
				
			}
			
			
			else
			{
				
			window.location.href='checkout.php'	;
				
				
			}
				
				
			
		}
	
	
	function pracquestionvisibility(type)
	{
		   
	question_value=parseInt(document.getElementById('question_value').value);
mainActiveques=document.getElementById('mainActiveques').value;
	
	if(type=='2')
	{
	
	var newval=1 + parseInt(question_value);
	
document.getElementById('question_value').value=newval;
	if(newval>1)
{
// alert(newval);
 //alert(question_value);
	//document.getElementById('prev_btn').style.display='block';
		  // $('#li'+question_value).removeAttr("active");

		  // $('#li'+newval).addClass("active");

	   $('#prev_btn').removeAttr("disabled");
	   if(mainActiveques==newval)
	   {
		   
		   	   $('#next_btn').prop('disabled', true);

	   }

	question_id=parseInt(document.getElementById('option'+newval).value);
		answer_id=document.getElementById('Ans'+question_id).value;
		//alert(answer_id);
		if(answer_id!='')
		{
		document.getElementById('Qs'+question_id+answer_id).checked=true;
		}
}

	  $('.nav-pills li.active').removeClass('active');

			 $('#li'+newval).addClass("active");

	 $('#Q'+question_value).removeClass(" active");

	 $('#Q'+newval).addClass(" active");

	}
	else if(type=='1')
	{
	
	var newval=parseInt(question_value)-1;
	if(newval==1)
{

	   $('#prev_btn').prop('disabled', true);
	
	
}
else
{
	
		   $('#next_btn').prop('disabled', false);

	
}
	  $('.nav-pills li.active').removeClass('active');

			 $('#li'+newval).addClass("active");

	document.getElementById('question_value').value=newval;
	
	 $('#Q'+question_value).removeClass("active");

	 $('#Q'+newval).addClass("active");
	 question_id=parseInt(document.getElementById('option'+newval).value);

		answer_id=document.getElementById('Ans'+question_id).value;
if(answer_id!='')
{
			document.getElementById('Qs'+question_id+answer_id).checked=true;
}

	}

if(document.getElementById('showcommentboxval').value==1)
{
showcommentbox(question_id);

}
	}
		
function questionvisibility(type)
{    var d = new Date();
  var ntime = d.getTime();  
	question_value=parseInt(document.getElementById('question_value').value);
mainActiveques=document.getElementById('mainActiveques').value;
	var lcv=document.getElementById('lastclicked').value;
document.getElementById('pastclickedval').value=lcv;
	if(type=='2')
	{
	
	var newval=1 + parseInt(question_value);
	
document.getElementById('question_value').value=newval;
	if(newval>1)
{
// alert(newval);
 //alert(question_value);
	//document.getElementById('prev_btn').style.display='block';
		  // $('#li'+question_value).removeAttr("active");

		  // $('#li'+newval).addClass("active");

	   $('#prev_btn').removeAttr("disabled");
	   if(mainActiveques==newval)
	   {
		   
		   	   $('#next_btn').prop('disabled', true);

	   }
	question_id=parseInt(document.getElementById('option'+newval).value);
		answer_id=document.getElementById('Ans'+question_id).value;
		if(answer_id!='')
		{ 
		if(answer_id>0)
		{
		document.getElementById('Qs'+question_id+answer_id).checked=true;
		}
		}
}

	  $('.nav-pills li.active').removeClass('active');

			 $('#li'+newval).addClass("active");

	 $('#Q'+question_value).removeClass(" active");

	 $('#Q'+newval).addClass(" active");

	}
	else if(type=='1')
	{
	
	var newval=parseInt(question_value)-1;
	if(newval==1)
{

	   $('#prev_btn').prop('disabled', true);
	
	
}
else
{
	
		   $('#next_btn').prop('disabled', false);

	
}
	  $('.nav-pills li.active').removeClass('active');

			 $('#li'+newval).addClass("active");

	document.getElementById('question_value').value=newval;
	
	 $('#Q'+question_value).removeClass("active");

	 $('#Q'+newval).addClass("active");
	 question_id=parseInt(document.getElementById('option'+newval).value);

		answer_id=document.getElementById('Ans'+question_id).value;
if(answer_id!='')
{
			document.getElementById('Qs'+question_id+answer_id).checked=true;
}

	}
	oldeffected=document.getElementById('effected'+newval).value;
		seteffected=document.getElementById('effected'+lcv).value;
		if(seteffected=='')
		{
			seteffected=0;
			
		}
		if(oldeffected==='')
		{
			
			oldeffected=0;
			
		}
		
			document.getElementById('end'+lcv).value=ntime;

var getstart=document.getElementById('start'+lcv).value;
effected=(parseInt(ntime)-parseInt(getstart))*0.001;

if(document.getElementById('effected'+newval).value!='')
{
	document.getElementById('effected'+newval).value=effected + parseInt(oldeffected);  
}
	document.getElementById('effected'+lcv).value=effected +  parseInt(seteffected);

	document.getElementById('start'+newval).value=ntime;

	
	lastclicked=newval
			document.getElementById('lastclicked').value=lastclicked;

}
function practiceQuestion(val)   
{
	//in active
 

	mainActiveques=document.getElementById('mainActiveques').value;


//	mainActiveques=document.getElementById('mainActiveques').value=val;

document.getElementById('question_value').value=val;
if(val==1)
{   


	   $('#prev_btn').prop('disabled', true);
		  $('#next_btn').prop('disabled', false);

	   
}
else 
{
	  $('#next_btn').prop('disabled', false);
	   $('#prev_btn').prop('disabled', false);
	
	
}

 if(mainActiveques==val)
	   {
		   	   $('#next_btn').prop('disabled', true);

	   }
	$('div').find('.active').removeClass("active");
	    $('.nav-pills li.active').removeClass('active');

			 $('#li'+val).addClass("active");
$('.tab-content').addClass('not-active');
//	document.getElementById('Q'+val).style.display='block';
		 $('#Q'+val).addClass("in active").removeClass('not-active');;


	
	if(document.getElementById('showcommentboxval').value==1)
{
showcommentbox(val);

}
	
	
}

function MiniActiveQuestion(val)
{
	//in active
  var d = new Date();
  var ntime = d.getTime();

	mainActiveques=document.getElementById('mainActiveques').value;

 
	


//	mainActiveques=document.getElementById('mainActiveques').value=val;

document.getElementById('question_value').value=val;
if(val==1)
{   


	   $('#prev_btn').prop('disabled', true);
		  $('#next_btn').prop('disabled', false);

	   
}
else 
{
	  $('#next_btn').prop('disabled', false);
	   $('#prev_btn').prop('disabled', false);
	
	
}

 if(mainActiveques==val)
	   {
		   	   $('#next_btn').prop('disabled', true);

	   }
	$('div').find('.active').removeClass("active");
	    $('.nav-pills li.active').removeClass('active');

			 $('#li'+val).addClass("active");
$('.tab-content').addClass('not-active');
//	document.getElementById('Q'+val).style.display='block';


		 $('#Q'+val).addClass("in active").removeClass('not-active');;


	
	
	
	
}



function activeQuestion(val)
{//in active
  var d = new Date();
  var ntime = d.getTime();
var lcv=document.getElementById('lastclicked').value;
document.getElementById('pastclickedval').value=lcv;
	oldeffected=document.getElementById('effected'+val).value;
	mainActiveques=document.getElementById('mainActiveques').value;

		seteffected=document.getElementById('effected'+lcv).value;
		if(seteffected=='')
		{
			seteffected=0;
			
		}
		if(oldeffected==='')
		{
			
			oldeffected=0;
			
		}
	document.getElementById('end'+lcv).value=ntime;

var getstart=document.getElementById('start'+lcv).value;
effected=(parseInt(ntime)-parseInt(getstart))*0.001;

if(document.getElementById('effected'+val).value!='')
{
	//document.getElementById('effected'+val).value=effected + parseInt(oldeffected);  
} 
	document.getElementById('effected'+lcv).value=effected +  parseInt(seteffected);  

	document.getElementById('start'+val).value=ntime;


//	mainActiveques=document.getElementById('mainActiveques').value=val;

document.getElementById('question_value').value=val;
if(val==1)
{   


	   $('#prev_btn').prop('disabled', true);
		  $('#next_btn').prop('disabled', false);

	   
}
else 
{
	  $('#next_btn').prop('disabled', false);
	   $('#prev_btn').prop('disabled', false);
	
	
}

 if(mainActiveques==val)
	   {
		   	   $('#next_btn').prop('disabled', true);

	   }
	$('div').find('.active').removeClass("active");
	    $('.nav-pills li.active').removeClass('active');

			 $('#li'+val).addClass("active");
$('.tab-content').addClass('not-active');
//	document.getElementById('Q'+val).style.display='block';
$('#Q'+val).addClass("in active");
		 $('#Q'+val).addClass("in active").removeClass('not-active');;
lastclicked=val

test=document.getElementById('#Q'+val);
 			document.getElementById('lastclicked').value=lastclicked;
		
}


function deleteitem(count)
{
	
	val=baseurl+'/test.php?cnt='+count;
	window.location=val;
	
	
}


$("#country").change(function(){
 
 menuId=$('#country').val()
 var request = $.ajax({
  url: baseurl+"/getlocationbycountry.php",
  type: "POST",
  data: {id : menuId},
  beforeSend: function() {  $("#loader").show()}
  //dataType: "html"
});


request.done(function(msg) {
 $("#loader").hide();
  $("#coutrydiv").html( msg );
});


 });
 
 
 function showcommentbox1(question_id)
 {
	
	 
 $.ajax({
        type: "POST",
		dataType:'json',
        url: baseurl+"/ajaxCallToPhp/commentbox.php",
        data: { 
        	question_id:question_id
			
        },
        success: function(result) {
		alert();	
        },
        error: function(result) {
            
        }
    });
 
	 
	 
	 
	 
 }
 
 function showcommentbox(question_id){
	

 var xmlHttpReq = false;

    if (window.XMLHttpRequest)

	 {

        xmlHttpReq = new XMLHttpRequest();

    }

    else if (window.ActiveXObject)

	 {

        xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");

    }

	

	xmlHttpReq.onreadystatechange = function()

      {

		 if (xmlHttpReq.readyState == 4)

	   {    

		     response=xmlHttpReq.responseText;
			 

			 document.getElementById('displaysolution').innerHTML=response;
 
			 
			}else{


		   }

			}

	 xmlHttpReq.open('GET',baseurl+'/ajaxCallToPhp/commentbox.php?question_id='+question_id, true);

	 xmlHttpReq.send(null); 	

}


function setboughtpackage(packid,oid)
{
	
	
	$.ajax({
        type: "POST",
		dataType:'json',
        url: baseurl+"/ajaxCallToPhp/setpackid.php",
        data: { 
        	packid:packid,
			oid:oid,
			
        },
        success: function(result) {},
        error: function(result) {
            
        }
    });
	
	
	
	
	
	
	
	
}


