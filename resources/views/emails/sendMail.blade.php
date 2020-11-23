@component('mail::message')

# Đặt hàng thành công

Cám ơn bạn đã đặt hàng tại shop xxx
Chi tiết đơn hàng

@component('mail::table')
| Tên sản phẩm | Giá | Số lượng | Tổng tiền |
|:----:| -----:| ---:| --------:|
@foreach($details as $item)
| {{ $item->name }} | {{ $item->price }} | {{ $item->qty }}| {{ $item->price*$item->qty }} |
@endforeach
|  |  | Tổng cộng: | {{ number_format(Cart::subtotal(0,'','')) }} |
@endcomponent

@component('mail::button', ['url' => 'https://larave-news.com', 'color' => 'blue'])
Trở lại cửa hàng
@endcomponent
{{ date('d-m-Y') }}
@endcomponent
