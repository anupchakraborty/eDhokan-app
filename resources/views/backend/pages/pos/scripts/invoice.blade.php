<script type="text/javascript">
    $("#invoice_info").hide();
    //Supplier Show
    var icount = 1;
    function showCustomer(){
        const customerId = document.getElementById('customer_id').value;
        // console.log(customerId);

        //date
        var monthNames = [ "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December" ];
        var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

        var newDate = new Date();
        newDate.setDate(newDate.getDate());    
        $('#current_date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

        var lastID = $('#getInvoiceId').val();
        var invoice_id = parseInt(lastID);
        $("#invoiceId").html(invoice_id);

        $.ajax({
            method: 'get',
            url: "{{URL::to('admin/show-customer')}}",
            data: {
                'cid' : customerId
            },
            success: function(data){
                // console.log(data);
                //const showcustomer = document.getElementById('showcustomer');
                $('#showcustomer').html(data);
            }
        });
    }
    icount++;
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
                    $('#price').text(price.sell_price);
                    //console.log(price);
                }
            });
        });
        //show product
        var count = 1;
        $('#addProduct').on('click',function(){
            $("#invoice_info").show();
            //add product
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

                    var table = '<tr><td><input type="hidden" name="invoice_id" value="10{{ $lastId }}">'+ count +'</td><td><input type="hidden" name="product_id[]" value="'+ product_id +'">'+ productName +'</td><td><input type="hidden" name="quantity[]" value="'+ qty +'">'+ qty +'</td><td><input type="hidden" name="unit_price[]" value="'+ price +'">'+ price +'</td><td><strong><input type="hidden" name="sub_total[]" id="total" value="'+ total +'">'+ total +'</strong></td></tr>';
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


