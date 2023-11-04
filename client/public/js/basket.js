const productsList = document.querySelector('#productsList')

const basketProducts = $('#basketBody')
const basketCount = $('#basketCount')

function ajax(url, productId) {

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url + productId,
        method: 'POST',
        success: (response) => {

            const basketProductPrice = $('#productPrice-' + productId)

            const basketProductCost = $('#productCost-' + productId)
            const basketProductCostValue = basketProductCost.html()

            basketProductPrice.html(basketProductCostValue * response.count)

            $('#count-' + productId).html(response.count)
            basketCount.html(response.basketCount)
            $('#totalBasketPrice').html(response.totalBasketPrice)

        },
        error: (error) => {

            console.log(error)

        }
    })

}

basketProducts.click((event) => {
    if (event.target.dataset) {

        const type = event.target.dataset.type
        const productId = event.target.dataset.id

        if (type === 'remove') {
            ajax('/api/v1/basket/delete/', productId)
        } else if (type === 'add') {
            ajax('/api/v1/basket/add/', productId)
        }

        const remove = event.target.dataset.remove

        if (remove) {

            const product = document.querySelector('#product-' + remove)

            product.style.display = 'none'

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/api/v1/basket/remove/' + remove,
                method: 'POST',
                success: (data) => {
                    const totalBasketPrice = $('#totalBasketPrice')
                    totalBasketPrice.html(data.totalBasketPrice)
                    basketCount.html(data.basketCount)
                    console.log(data.basketCount)

                    if (!data.basketProducts) {
                        $('#makeOrder').css('display', 'none')
                        $('#totalPrice').css('display', 'none')
                        const basketBody = document.querySelector('#basketBody')
                        basketBody.insertAdjacentHTML('beforeend',
                            '<tr><td>Корзина пуста</td></tr>'
                        )
                    }
                }
            })

        }

    }
})

productsList.onclick = (event) => {

    if (event.target.dataset) {

        const productId = event.target.dataset.id

        if (productId) {

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/api/v1/basket/add/' + productId,
                method: 'POST',
                success: () => {

                    const url = window.location.pathname
                    if (url !== '/basket') window.location.href = '/basket'

                },
                error: (error) => {

                    console.log(error)

                }
            })

        }

    }

}
