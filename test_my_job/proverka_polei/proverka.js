function updateCaptcha()
		{
			document.getElementById("captcha").src = 'http://msk-taxi.ru/kcaptcha/?' + Math.random();
			return false;
		}
		


function checkForm()
		{
			var fio = document.getElementById("fio").value;
			var email = document.getElementById("email").value;
			var textareaform = document.getElementById("textareaform").value;
			
			if (fio.length > 0 && email.length > 0 && textareaform.length > 0)
				document.getElementById("submitzay").disabled = false;
			else
				document.getElementById("submitzay").disabled = true;
		}