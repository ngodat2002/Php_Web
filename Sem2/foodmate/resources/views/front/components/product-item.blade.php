
<div class="col">
    <div class="product-item">
        <div class="pi-pic">
            <img src="front/img/menu/{{$product->image}}" alt="">
            <div class="rate">
                <i class="fas fa-star"></i>
                <span>{{$product->rate}}</span>
            </div>
        </div>
        <div class="pi-text">
            <div class="food-name">{{$product->restaurants->name}}</div>
            <a href="#">
                <h5>{{$product->name}}</h5>
            </a>
            <p class="description">{{$product->description}}</p>
            <div class="card-food">
            <div class="food-price">
                ${{$product->price}}
            </div>
            <div class="card-view">
                  <a href="./cart/add/{{$product->id}}" class="btn btn-warning" style="width: 140px">Add To Cart</a>
            </div>
            </div>
        </div>
    </div>
</div>
