$(document).ready(function () {
    $("#addNew").on('click', function () {
        $('#productForm')[0].reset();
        $("#productForm input[name='id']").remove()
        $("#productModal").modal('show');
    })

    $('#productForm').on('submit', function (e) {
        e.preventDefault();

        console.log(name);

        var formData = {
            _token: $("input[name='_token']").val(),
            name: $('#name').val(),
            price: $('#price').val(),
            quantity: $('#quantity').val(),
        }

        var productId = $("input[name='id']").val();
        if (productId) {
            formData.id = productId;
        }
        var url = productId ? '/update' : '/store';

        $.ajax({
            url: url,
            method: 'post',
            data: formData,
            success: function () {
                $("#productModal").modal('hide');
                loadProducts();
            },
            error: function (xhr, status, error) {
                alert("Something went wrong");
            }
        })


    })


    function loadProducts() {
        $.ajax({
            url: '/get-products',
            method: 'get',
            success: function (response) {
                $('#tableContent').empty();
                let totalValue = 0;

                console.log(response.products);

                response.products.forEach(function (product, index) {

                    totalValue += product['total_value']
                    let row = `
                                  <tr>
                                       <td>${product['name']}</td>
                                       <td>${product['quantity']}</td>
                                       <td>${product['price']}</td>
                                       <td>${product['datetime']}</td>
                                       <td>${product['total_value']}</td>
                                       <td><button class="btn btn-success editProduct" data-pid="${index}">Edit</button></td>
                                  </tr>
                             `;
                    $('#tableContent').append(row);

                });

                let totalRow = `
                                  <tr>
                                       <td colspan=4>Total</td>
                                       <td><strong>${totalValue}<strong></td>
                                       <td></td>
                                  </tr>
                             `;
                $('#tableContent').append(totalRow);

                $(".editProduct").click(function () {
                    let index = $(this).data('pid');

                    $('#productForm')[0].reset();
                    $("#productForm input[name='id']").remove()
                    $('#productForm').append(`<input type="hidden" name="id" value="${index}">`);

                    $.ajax({
                        url: "/edit/" + index,
                        method: "get",
                        success: function (product) {
                            $('#name').val(product['name']);
                            $('#price').val(product['price']);
                            $('#quantity').val(product['quantity']);
                        },
                        error: function () {

                        }
                    })

                    $("#productModal").modal('show');
                })

            },
            error: function (xhr, status, error) {
                alert("Something went wrong");
            }
        })
    }

    loadProducts();
})