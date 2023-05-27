<script type="text/javascript">
    //Supplier Show
    function showSupplier(){
        const supplierId = document.getElementById('supplier_id').value;
        // console.log(supplierId);

        $.ajax({
            method: 'get',
            url: "{{URL::to('admin/show-supplier')}}",
            data: {
                'sid' : supplierId
            },
            success: function(data){
                // console.log(data);
                //const showSupplier = document.getElementById('showSupplier');
                $('#showSupplier').html(data);
            }
        });
    }
    //Product Show
    $(document).ready(function(){
        //get pice
        $('#product_id').change(function(){
            var ids = $(this).find(':selected')[0].id;
            $.ajax({
                type: 'GET',
                url: "{{ URL::to('admin/get-price/{id}') }}",
                data: {
                    id : ids
                },
                dataType: 'json',
                success: function(price){
                    $('#price').text(price.buy_price);
                    //console.log(price);
                }
            });
        });
        //show product
        var count = 1;
        $('#addProduct').on('click',function(){
            var product_id = $('#product_id').find(':selected')[0].id;
            var productName = $('#product_id').find(":selected").text();
            var qty = $('#qty').val();
            var price = $('#price').text();

            if(qty == 0){
                var errorMsg = '<span class="alert alert-danger">Minimum Quantity Should be More than 0</span>';
                $('#errorMsg').html(errorMsg);
            }else{
                showProduct();
            }
            //showProduct
            function showProduct(){
                var total = 0;

                $('#getProduct').each(function(){
                    var total = qty * price;
                    var subTotal = 0;
                    subTotal += parseInt(total);

                    var table = '<tr><td>'+ count +'</td><td><input type="hidden" name="product_id[]" value="'+ product_id +'">'+ productName +'</td><td><input type="hidden" name="quantity[]" value="'+ qty +'">'+ qty +'</td><td>'+ price +'</td><td><strong><input type="hidden" id="total" value="'+ total +'">'+ total +'</strong></td></tr>';
                    $('#new').append(table);

                    //code for sub total and products
                    var total = 0;
                    $('tbody tr td:last-child').each(function(){
                        var valueToal = parseInt($('#total', this).val());
                        if(!isNaN(valueToal)){
                            total += valueToal;
                        }
                    });
                    //subtotal show
                    $('#subTotal').text(total);
                    //code for calculate tax and subtotal
                    var tax = (total*5)/100;
                    $('#taxTotal').text(tax.toFixed(2));

                    //code total payments
                    var subtotal = $('#subTotal').text();
                    var taxtotal = $('#taxTotal').text();
                    
                    var grosstotal = parseInt(subtotal) + parseFloat(taxtotal);
                    $('#grossTotal').text(grosstotal.toFixed(2));
                });
                count++;
            }
        });

    });






</script>


