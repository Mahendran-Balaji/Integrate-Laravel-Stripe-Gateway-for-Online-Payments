<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <title>Products</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center"> List of all Products </h1>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price (Rs.) </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($allProducts as $key=>$value) {
                        ?>        
                            <tr>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->description }}</td>
                                <td>{{ $value->price }}</td>
                                <td> 
                                    <form action="/charge" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="product_name" value="{{ $value->name }}">
                                        <input type="hidden" name="product_desc" value="{{ $value->description }}">
                                        <input type="hidden" name="product_price" value="{{ $value->price*100 }}">
                                        <script
                                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                            data-key="{{ env('STRIPE_PUB_KEY') }}"
                                            data-amount="{{ $value->price*100 }}"
                                            data-name="{{ $value->name }}"
                                            data-description="{{ $value->description }}"
                                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                            data-locale="auto"
                                            data-currency="inr">
                                        </script>
                                    </form>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    
       

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
  $(function() {
    $(".stripe-button-el").replaceWith('<button type="submit" class="btn btn-success"><span>Buy Now</span></button>');
  });
</script>
    </body>
</html>