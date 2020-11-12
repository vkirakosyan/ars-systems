const fieldValidations = {
	name: false,
	subject: true,
	email: false,
	file: false
}

$(".send-resume").on('click', function(){
	const vacancy = $(this).closest('.career-item').find('.vacancy-text').text();
	$("#sender-subject").val(vacancy);
});

$('.career-item').on('click', function(){
	const state = $(this).find('.detailed-description').css('display');
	state == 'flex' ? $(this).find('.detailed-description').css('display','none') : $(this).find('.detailed-description').css('display','flex');
});

$('form').on('submit', (e) => {
	const size = e.target[3].files["0"].size / 1024;
	if(size >= 2048)
	{
		e.preventDefault();
		alert('Attachment file size is too big!Should be less than 2 Megabytes!');
	}
});

$('#sender-name, #sender-subject, #sender-email').on('keyup', function(){
	const currentId = $(this).attr('id');
	const currentField = currentId.slice(currentId.lastIndexOf('-') + 1);
	
	if($(this).val().length >= 2)
	{
		fieldValidations[currentField] = true;
	}

	checkFields();
});

$('#sender-file').on('change', function(){
	if($(this)[0].files.length == 1)
	{
		fieldValidations.file = true;
	}
	
	checkFields();
});

function checkFields()
{
	$("#send-mail").attr('disabled', false);
	for(field in fieldValidations)
	{
		if(fieldValidations[field] == false)
		{
			$("#send-mail").attr('disabled', true);
		}
	}
}