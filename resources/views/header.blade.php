<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> 90-92 Lê Thị Riêng, Bến Thành, Quận 1</a></li>
						<li><a href=""><i class="fa fa-phone"></i> 0163 296 7751</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						<li><a href="#"><i class="fa fa-user"></i>Tài khoản</a></li>
						<li><a href="#">Đăng kí</a></li>
						<li><a href="#">Đăng nhập</a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="index.html" id="logo"><img src="source/assets/dest/images/logo-cake.png" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="/">
					        <input type="text" value="" name="s" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (<span id="tongsl">@if(Session::has('cart')){{$totalQty}}@else Trống @endif</span>) <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
								@if(Session::has('cart'))
									@foreach($product_cart as $product)
								<div class="cart-item" id="cart-item{{$product['item']['id']}}">
									<a class="cart-item-delete" value="{{$product['item']['id']}}" soluong="{{$product['qty']}}"><i class="fa fa-times"></i></a>
									<div class="media">
										<a class="pull-left" href="#"><img src="source/image/product/{{$product['item']['image']}}" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">{{$product['item']['name']}}</span>
											<span class="cart-item-amount">{{$product['qty']}}*<span id="dongia{{$product['item']['id']}}" value="@if($product['item']['promotion_price']==0){{($product['item']['unit_price'])}}@else {{($product['item']['promotion_price'])}}@endif">@if($product['item']['promotion_price']==0){{number_format($product['item']['unit_price'])}}@else {{number_format($product['item']['promotion_price'])}}@endif</span></span>
										</div>
									</div>
								</div>
									@endforeach
								@endif
								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value" value="@if(Session::has('cart')){{($totalPrice)}}@else 0 @endif">@if(Session::has('cart')){{number_format($totalPrice)}}@else 0 @endif đồng</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{route('dathang')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
						</div> <!-- .cart -->
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{route('index')}}">Trang chủ</a></li>
						<li><a href="#">Loại sản phẩm</a>
							<ul class="sub-menu">
								@foreach($loaisp as $loai)
								<li><a href="{{route('loaisp')}}">{{$loai->name}}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="about.html">Giới thiệu</a></li>
						<li><a href="contacts.html">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->
	<script src="source/assets/dest/js/jquery.js"></script>
<script>
$(document).ready(function($) {    
	
	$('.cart-item-delete').click(function(){
		var id = $(this).attr('value');
		var route = "{{route('del-cart',':id_sp')}}";
		route = route.replace(':id_sp',id);

		var soluong = $(this).attr('soluong')
		var dongia = $('#dongia'+id).attr('value')
		var tongdonggia = $('.cart-total-value').attr('value');
		
		$.ajax({
			url: route,
			type: 'get',
			data: {id:id},
			success:function(){
				var tongsl = $('#tongsl').html();
				$('#tongsl').html(parseInt(tongsl)-parseInt(soluong));

				$('.cart-total-value').html(parseInt(tongdonggia)-(parseInt(soluong)*parseInt(dongia))+' đồng');
				$('.cart-total-value').attr('value',parseInt(tongdonggia)-(parseInt(soluong)*parseInt(dongia)));
				$('#cart-item'+id).hide();
			},
			error:function(data){
				console.log(data)
			}
		})
	})
})
</script>