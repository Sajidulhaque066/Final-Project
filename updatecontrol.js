const form=document.getElementById('form');
const old_uname=document.getElementById('uname');
const password=document.getElementById('pass');
const email=document.getElementById('email');
const religion=document.getElementById('rel');
const nationality=document.getElementById('nt');
const address=document.getElementById('address');
const gender=document.getElementById('gender');
form.addEventListener('submit', (e)=>{
	e.preventDefault();
	validate();
});
function validate()
{
	if(uname.value=="")
	{
		alert("Username empty!")
		return false;
		if (password.value=="") 
		{
			alert("Password empty!")
			return false;
			if (email.value=="") 
			{
				alert("E-mail empty!")
				return false;
				if (religion.value=="")
				{
					alert("Religion empty!")
					return false;
					if (nationality.value=="")
					{
						alert("Nationality empty!")
						return false;
						if (address.value=="") 
						{
							alert("Address empty!")
							return false;
							if (gender.value=="") 
							{
								alert("Gender empty!")
								return false;
							}
							else
							{
								return true;
							}
						}
					}
				}
			}
		}
	}
		
}
function setError(input,msg)
{
	const x=document.getElementById('form-control');
	const smalltag=x.querySelector('small');
	smalltag.innerHTML=msg;
	smalltag.style.visibility="visible";
	const itag=document.getElementById('error');
	itag.style.visibility="visible";
	itag.style.color="red";
	input.style.borderColor="red";
}
function setSuccess(input)
{
	const itag=document.getElementById('success');
	itag.style.visibility="visible";
	itag.style.color="green";
	input.style.borderColor="green";
}
//setError(uname_1,'User name is empty');
//	else
//		setSuccess(uname_1);