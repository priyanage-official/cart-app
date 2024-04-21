$(document).ready(function () {

    $(".AddToCart").on("click", function (e) {
        let id = $(this).attr("id").split("-")[1];

        let href = "http://127.0.0.1:8000/add-to-cart/";

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: href,
            method: "POST",
            data: {
                product_id: id
            },
            success: function (resposne, textStatus, jqXHR) {
                console.log('resposne',resposne);
                
                if (jqXHR.responseJSON.statusCode == 200) {
                    $("#AddToCart-"+resposne.data.product_id).html('Remove from Cart');
                    $("#AddToCart-"+resposne.data.product_id).removeClass('btn-primary');
                    $("#AddToCart-"+resposne.data.product_id).removeClass('AddToCart');
                    $("#AddToCart-"+resposne.data.product_id).addClass('RemoveFromCart');
                    $("#AddToCart-"+resposne.data.product_id).addClass('btn-danger');
                    $("#AddToCart-"+resposne.data.product_id).attr('id', 'RemoveFromCart-'+resposne.data.product_id);
                    
                    $("#userCartCount").html(resposne.data.getUserCart);
                    $.jGrowl(jqXHR.responseJSON.message, {
                        header: 'Add To Cart',
                        group: 'bg-primary',
                    });
                } else {
                    $.jGrowl(jqXHR.responseJSON.message, {
                        header: 'Add To Cart',
                        group: 'bg-danger',
                    });
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $(this).attr('disabled', false);
                $.jGrowl('Please Login First!', {
                    header: 'Add To Cart',
                    group: 'bg-danger',
                });
            }
        })

    });

    $(".RemoveFromCart").on("click", function (e) {
        let id = $(this).attr("id").split("-")[1];

        let href = "http://127.0.0.1:8000/remove-to-cart";

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: href,
            method: "POST",
            data: {
                product_id: id
            },
            success: function (resposne, textStatus, jqXHR) {
                console.log('resposne',resposne);
                
                if (jqXHR.responseJSON.statusCode == 200) {
                    $("#RemoveFromCart-"+resposne.data.product_id).html('Add To Cart');
                    $("#RemoveFromCart-"+resposne.data.product_id).removeClass('RemoveFromCart');
                    $("#RemoveFromCart-"+resposne.data.product_id).removeClass('btn-danger');
                    $("#RemoveFromCart-"+resposne.data.product_id).addClass('AddToCart');
                    $("#RemoveFromCart-"+resposne.data.product_id).addClass('btn-primary');
                    $("#RemoveFromCart-"+resposne.data.product_id).attr('id', 'AddToCart-'+resposne.data.product_id);

                    $("#userCartCount").html(resposne.data.getUserCart);
                    $.jGrowl(jqXHR.responseJSON.message, {
                        header: 'Remove From Cart',
                        group: 'bg-primary',
                    });
                } else {
                    $.jGrowl(jqXHR.responseJSON.message, {
                        header: 'Remove From Cart',
                        group: 'bg-danger',
                    });
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $(this).attr('disabled', false);
                $.jGrowl('Please Login First!', {
                    header: 'Remove From Cart',
                    group: 'bg-danger',
                });
            }
        })

    });

});