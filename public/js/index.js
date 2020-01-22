$(document).ready(() => {
    class Basket {
        constructor() {
            this.products = this.getProducts();
            this.init();
        }

        init = () => {

            if (this.products) {
                this.render();
            } else {
                $('.cart-body').html('<h2 class="mt-5 ml-5 mb-5 display-1">Empty cart</h2>');
            }

            this.initStaticListeners();
            this.initListeners();
        };

        initListeners = () => {
            if (this.products) {
                $('.remove-item-in-cart').on('click', event => {
                    console.log(this.products);
                    // тут удаляешь из localStorage по id
                    let id = event.target.dataset.id;
                    for (let i = 0; i < this.products.length; i++) {
                        if (this.products[i].id === id) {
                            this.products.splice(this.products.indexOf(this.products[i]), 1);
                        }
                    }
                    this.setProducts(this.products);
                    // выполняешь функцию getProducts()
                    this.products = this.getProducts();
                    this.render();
                    this.initListeners();

                });

                $('.cart-quantity-input').on('change', event => {
                    // event.stopPropagation();
                    let quantity = $(event.currentTarget).val();
                    let $tr = event.currentTarget.closest('tr');
                    let id = $tr.dataset.productid;

                    for (let i = 0; i < this.products.length; i++) {
                        if (this.products[i].id === id) {
                            this.products[i].quantity = quantity;
                        }
                    }

                    this.setProducts(this.products);
                    this.products = this.getProducts();
                    this.render();
                    this.initListeners();

                });
            }
        };

        initStaticListeners = () => {

            $('.add-to-cart').on('click', event => {
                let id = event.target.dataset.id;
                let title = event.target.dataset.title;
                let price = event.target.dataset.price;
                let smallImage = event.target.dataset.image;
                let quantity = Number(event.target.dataset.quantity);

                if (!this.products) {
                    let product = [{
                        id: id,
                        title: title,
                        price: price,
                        smallImage: smallImage,
                        quantity: quantity
                    }];

                    this.setProducts(product);

                } else {
                    let status = false;

                    for (let i = 0; i < this.products.length; i++) {
                        if (this.products[i].id === id) {
                            this.products[i].quantity += quantity;
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
                        this.products = [...this.products, product];
                    }
                    this.setProducts(this.products);

                }
                this.products = this.getProducts();
                this.render();
                this.initListeners();

            });

        };

        getProducts = () => JSON.parse(localStorage.getItem('products'));

        setProducts = data => localStorage.setItem('products' , JSON.stringify(data));

        renderTableRow = row => `
            <tr data-productid="${ row.id }">
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
                            <input type="number" name="product" value="${ row.quantity }" class="prod_qty cart-quantity-input">
                        </div>
                    </div>
                </td>
                <td class="sub-total">$${ row.price * row.quantity }</td>
                <td class="remove"><a class="remove-btn remove-item-in-cart" data-id="${ row.id }">x</a></td>
            </tr>
        `;

        renderTableBody = products => products.map(row => this.renderTableRow(row)).join(' ');

        renderCart = () => {
            $('.cart-body').html(`
                <div class="modal-header mt-5 ml-5">
                    <h2 class="modal-title">Cart</h2>
                </div>
                <!--Cart Section-->
                <section class="cart-section">
                    <div class="auto-container">
                        <!--Cart Outer-->
                        <div class="cart-outer">
                            <div class="table-outer cart-table">
                                ${ this.renderTable() }
                            </div>
                            <br>
                            <div class="row clearfix">
                                <div class="column pull-right col-md-5 col-sm-12 col-xs-12">
                                    <!--Totals Table-->
                                    <ul class="totals-table">
                                        <li class="clearfix"><span class="col col-title">Total</span><span class="col total-price">$${ this.countTotal() }</span></li>
                                    </ul>
                                    <div class="text-right"><button type="submit" class="theme-btn checkout-btn btn-style-four">Proceed to Checkout</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Cart Section -->
            `);
        };

        renderTable = () => {
            return `
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
                      ${ this.renderTableBody(this.products) }
                  </tbody>
              </table>
            `;
        };

        countTotal = () => {
            let total = 0;

            for (let i = 0; i < this.products.length; i++) {
                total += this.products[i].price * this.products[i].quantity;
            }

            return total;
        };

        renderBasketCount = () => {
            $('.count').html(this.products.length);
        };

        render() {
            this.renderBasketCount();


            console.log(this.products);
            if (this.products !== null) {
                if (this.products.length > 0) {
                    console.log(1);
                    this.renderCart();
                } else {
                    $('.cart-body').html('<h2 class="mt-5 ml-5 mb-5 display-1">Empty cart</h2>');
                }
            } else {
                $('.cart-body').html('<h2 class="mt-5 ml-5 mb-5 display-1">Empty cart</h2>');
            }

        }
    }

    new Basket
});
