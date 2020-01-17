$(document).ready(() => {

    let products = JSON.parse(localStorage.getItem('products'));

    const countProducts = (products) => {
        let countOfProducts = 0;

        for (let i = 0; i < products.length; i++) {
            countOfProducts += Number(products[i].quantity);
        }

        return countOfProducts;
    };

    const setCountOfProducts = (products) => {
            $('.count').html(countProducts(products));
    };

    if (products) {
        setCountOfProducts(products);
    }


    $('.add-to-cart').on('click', (event) => {
        let id = event.target.dataset.id;
        let title = event.target.dataset.title;
        let price = event.target.dataset.price;
        let smallImage = event.target.dataset.image;
        let quantity = Number(event.target.dataset.quantity);
        console.log(quantity);
        let products = JSON.parse(localStorage.getItem('products'));

        if (!products) {
            let product = [{
                id: id,
                title: title,
                price: price,
                smallImage: smallImage,
                quantity: quantity
            }];
            localStorage.setItem('products', JSON.stringify(product));
            products = JSON.parse(localStorage.getItem('products'));
        } else {
            let status = false;

            for (let i = 0; i < products.length; i++) {
                if (products[i].id === id) {
                    products[i].quantity += quantity;
                    status = !status;
                }
            }

            if (!status) {
                let product = {
                    id: id,
                    title: title,
                    price: price,
                    smallImage: smallImage,
                    quantity: quantity
                };
                products = [...products, product];
            }
            localStorage.setItem('products', JSON.stringify(products));
        }

        setCountOfProducts(products);

    });


    const renderTableRow = row => `
        <tr>
            <td colspan="2" class="prod-column">
                <div class="column-box">
                    <figure class="prod-thumb"><a href="#"><img src="/images/uploads/products/${ row.smallImage }" alt=""></a></figure>
                    <h3 class="prod-title">${ row.title }</h3>
                </div>
            </td>
            <td class="price">$${ row.price }</td>
            <td class="qty">
                <div class="item-quantity">
                    <div class="quantity-spinner">
                        <button type="button" class="minus">-</button>
                        <input type="text" name="product" value="${ row.quantity }" class="prod_qty quantity-input">
                        <button type="button" class="plus">+</button>
                    </div>
                </div>
            </td>
            <td class="sub-total">$${ row.price * row.quantity }</td>
            <td class="remove"><a class="remove-btn remove-item-in-cart">x</a></td>
        </tr>
    `;


    const renderTableBody = products => products.map(row => renderTableRow(row)).join(' ');


    $('.cart-button').on('click', () => {
        let products = JSON.parse(localStorage.getItem('products'));

        if (products) {
            let tableOfProducts = `
                <table class="cart-table">
                    <thead class="cart-header">
                    <tr>
                        <th class="prod-column">Product</th>
                        <th>&nbsp;</th>
                        <th class="price">Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                        ${ renderTableBody(products) }
                    </tbody>
                </table>
            `;
            $('.cart-table').html(tableOfProducts);
        } else {
            let response = `
                <div class="container mt-5 ml-5 mb-5">
                    <h3>Empty cart</h3>
                </div>
            `;
            $('.cart-body').html(response);
        }
    });


    $('.quantity-input').on('change', (event) => {
        $('.add-to-cart').attr('data-quantity', event.target.value);
    });


    $('.remove-item-in-cart').on('click', (event) => {
        console.log(1);
    });

});
