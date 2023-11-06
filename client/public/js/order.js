const name = document.querySelector('.name')
const phone = document.querySelector('.phone')
const city = document.querySelector('.city')
const postal = document.querySelector('.postal')
const message = document.querySelector('.message')
const submit = document.querySelector('.submit')

submit.onclick = () => {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/api/v1/order/create',
        method: 'POST',
        data: {
            name: name.value,
            phone: phone.value,
            city: city.value,
            postal: postal.value,
            message: message.value,
        },
        success: () => {
            $('#basketCount').html(0)
            $('#success').removeClass('d-none')
            $('#form').css('display', 'none')
        },
        error: (error) => {
            const errors = error.responseJSON.errors
            const nameError = `<div class="text-danger">${errors.name ? errors.name : ''}</div>`
            $(nameError).insertAfter('#name')
            const phoneError = `<div class="text-danger">${errors.phone ? errors.phone : ''}</div>`
            $(phoneError).insertAfter('#phone')
            const cityError = `<div class="text-danger">${errors.city ? errors.city : ''}</div>`
            $(cityError).insertAfter('#city')
            const postalError = `<div class="text-danger">${errors.postal ? errors.postal : ''}</div>`
            $(postalError).insertAfter('#postal')
        }
    })
}
