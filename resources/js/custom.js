/*SAVING RECIPIENT, GROUP OR CAMPAIGN INFORMATION */

//Saving recipient information changes
$('#saveBtn, #updateBtn, #deleteBtn').on('click', function(e) {
	
	e.preventDefault()

	const btnID = this.id
	
	let entityData = {}
	
	$('#'+entity+'Form input:not([type=checkbox]),  #'+entity+'Form select, #'+entity+'Form textarea').each(function() {
		let name = $(this).attr('name')
		entityData[name] = $(this).val()
	})

	$('#'+entity+'Form [type=checkbox]').each(function() {
		let name = $(this).attr('name')
		entityData[name] = ($(this).prop('checked')) ? 1 : 0;
	})

	ajax(btnID, entityData)

})

const ajax = (btnID, entityData) => {

	let url

	switch (btnID) {

		case 'saveBtn':
		url = '/api/'+entity+'/save/'
		break

		case 'updateBtn':
		url = '/api/'+entity+'/save/'+entityData.id+'/'
		break

		case 'deleteBtn':
		url = '/api/'+entity+'/delete/'+entityData.id+'/'

	}

	let response = axios.post(url, entityData)
	.then(function(response) {
		$('#message').addClass(response.data.status === 'ok' ? 'ok' : 'error').text(response.data.text).show()
		if (!entityData.id) {
			$('#'+entity+'Form input[type=text], #'+entity+'Form input[type=email]', '#'+entity+'Form textarea').each(function () {
				$(this).val('');
			});
		}
	})

}


/*FILTER FUNCTIONS*/

//Choosing items
$('.all').on('click', function() {
	let status = $(this).prop('checked')
	let id = $(this).data('target')
	$('#'+id + ' input[type="checkbox"').each(function() {
		$(this).prop('checked', status)
	})
	reloadList()
})

$('.items-set').on('click', function() {	
	let id = this.id
	$('[data-target='+id+']').prop('checked', false)
	reloadList()
})

//Forming the array of filter parameters
let filterArr = {}
const formFilterArr = () => {
	$('.items-set').each(function() {
		let paramName = $(this).data('param') 
		let paramArr = []
		$(this).find('input').each(function(){
			if ($(this).prop('checked')) paramArr.push(this.name)
		})
		filterArr[paramName] = paramArr
	})
}

//Adding 'Add new' button
const makeAddBtn = (entity) => {
	const addBtn = '<div class="col-12 col-md-4 d-flex justify-content-end align-items-center"><a class="btn btn-success" href="/'+entity+'/edit/">Add New '+entity+'</a></div>'

	$('#'+entity+'Table_wrapper .row:first-child .col-md-6').removeClass('col-md-6').addClass('col-md-4')
	$col = $('#'+entity+'Table_wrapper .row:first-child').append(addBtn)
}

//Get recipients list with AJAX request 
function reloadList() {

	formFilterArr()

	$('#'+entity+'TableWrap').empty()

	axios.post('/'+entity+'/filter/', filterArr)
	.then(function (response) {

		$('#'+entity+'TableWrap').append(response.data)

		$('#'+entity+'Table').DataTable({
			columnDefs: [{
				orderable: false,
				className: 'select-checkbox',
				targets: 0
			},
			{
				orderable: false,
				className: 'select-checkbox',
				targets: (entity == 'recipient') ? 5 : 4
			}],
			"order": [[ 1, "asc" ]]
		})

		$('.dataTables_length').addClass('bs-select') 

		makeAddBtn(entity)
	})	
}

$(document).ready(function() {
	if (window.location.pathname.startsWith('/'+entity+'/list')) {
		if (typeof recGroupId !== 'undefined' && typeof (recGroupId * 1) === 'number') {
			$('#groupSet input').each(function(){
				$(this).prop('checked',false)
			})
			$('#groupSet input[name='+recGroupId+']').trigger('click')
		} else {
			reloadList()
		}

		//Enable mass checking of the list items 
		$(document).on('click', '#'+entity+'Table input[name=all]', function() {
			let status = $(this).prop('checked')
			$('#'+entity+'Table td input[type="checkbox"]').each(function() {
				$(this).prop('checked', status)
			})
		})
	}
})


/*CAMPAIGN PAGE*/
//Select all the recipients
$('.rec-group__heading input[type=checkbox]').on('click', function(e) {
	var campID = window.location.pathname.replace(/\D+/g,"")
	let arr = []
	const status = $(this).prop('checked')
	const groupID = $(this).attr('name')
	$('#'+groupID+' input[type=checkbox]').each(function() {
		if ($(this).prop('checked') !== status) {
			let recData = (status) ? {'camp_id': campID, 'rec_id': $(this).attr('name')} : $(this).attr('name')
			arr.push(recData)
			$(this).prop('checked', status)
		}
	})
	campRecAxios(arr, status, campID)
})

//Show recipients list
$('.rec-group__heading a').on('click', function(e) {
	e.preventDefault()
	let groupID = $(this).data('target')
	$('#'+groupID).toggleClass('active')
})

//Add/remove recipient to the campaign
$('.rec-list__item input').on('click', function() {
	var campID = window.location.pathname.replace(/\D+/g,"")
	let status = $(this).prop('checked')
	let arr = (status) ? {'camp_id': campID, 'rec_id': $(this).attr('name')} : [$(this).attr('name')]
	let groupID = $(this).parent('ul').attr('id')
	campRecAxios(arr, status, campID)
})

//Axios request
const campRecAxios = (arr, status, campID) => { 

	let req = {
		url: '/api/campaign/recipients/'+campID,
		method: (status) ? 'put' : 'delete',
		data: arr
	}

	axios(req).then(function(response) {
	})

}


