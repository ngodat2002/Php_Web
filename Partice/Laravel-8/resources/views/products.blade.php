<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Products</title>
    <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
</head>
<body>

    <div class="container">
        <div class="row" style="margin-top: 50px">
            <div class="col-md-6">
                  <div class="card">
                      <div class="card-header bg-primary text-white">Add new product</div>
                      <div class="card-body">
                          <form action="{{route('save.product')}}" method="post" enctype="multipart/form-data" id="form">
                            @csrf
                              <div class="form-group">
                                  <label for="">Product code</label>
                                  <input type="text" name="product_code" class="form-control" placeholder="Enter product code" required="required">
                                  <span class="text-danger error-text product_name_error"></span>
                              </div>
                              <div class="form-group">
                                  <label for="">Product name</label>
                                  <input type="text" name="product_name" class="form-control" placeholder="Enter product name">
                                  <span class="text-danger error-text product_name_error"></span>
                              </div>
                              <div class="form-group">
                                  <label for="">Product price</label>
                                  <input type="text" name="product_price" class="form-control" placeholder="Enter product price" required="required">
                                  <span class="text-danger error-text product_name_error"></span>
                              </div>
                              <div class="form-group">
                                  <label for="">Product image</label>
                                  <input type="file" name="product_image" class="form-control">
                                  <span class="text-danger error-text product_image_error"></span>
                              </div>

                              <div class="img-holder"></div>
                              <button type="submit" class="btn btn-primary">Save Product</button>
                          </form>
                      </div>
                  </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">All Products</div>
                    <div class="card-body" id="AllProducts">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('jquery.min.js')}}"></script>
    <script>
        $(function(){

            $('#form').on('submit', function(e){
                e.preventDefault();

                var form = this;
                $.ajax({
                    url:$(form).attr('action'),
                    method:$(form).attr('method'),
                    data:new FormData(form),
                    processData:false,
                    dataType:'json',
                    contentType:false,
                    beforeSend:function(){
                        $(form).find('span.error-text').text('');
                    },
                    success:function(data){
                        if(data.code == 0){
                            $.each(data.error, function(prefix,val){
                                $(form).find('span.'+prefix+'_error').text(val[0]);
                            });
                        }else{
                            $(form)[0].reset();
                            alert(data.msg);
                            fetchAllProducts();
                        }
                    }
                });
            });

            //Reset input file
            $('input[type="file"][name="product_image"]').val('');
            //Image preview
            $('input[type="file"][name="product_image"]').on('change', function(){
                var img_path = $(this)[0].value;
                var img_holder = $('.img-holder');
                var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();

                if(extension == 'jpeg' || extension == 'jpg' || extension == 'png'){
                     if(typeof(FileReader) != 'undefined'){
                          img_holder.empty();
                          var reader = new FileReader();
                          reader.onload = function(e){
                              $('<img/>',{'src':e.target.result,'class':'img-fluid','style':'max-width:100px;margin-bottom:10px;'}).appendTo(img_holder);
                          }
                          img_holder.show();
                          reader.readAsDataURL($(this)[0].files[0]);
                     }else{
                         $(img_holder).html('This browser does not support FileReader');
                     }
                }else{
                    $(img_holder).empty();
                }
            });

            //Fetch all products
            fetchAllProducts();
            function fetchAllProducts(){
                $.get('{{route("fetch.products")}}',{}, function(data){
                     $('#AllProducts').html(data.result);
                },'json');
            }

        })
    </script>
</body>
</html>
