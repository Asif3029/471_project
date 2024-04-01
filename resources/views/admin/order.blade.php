<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style type="text/css">
        .title_deg
        {
        text-align: center;
        font-size: 25px;
        font-weight: bold;
        padding-bottom: 40px;
        }

        .table_deg
        {
            border: 2px solid white;
            width: 100%;
            margin: auto;
            text-align: center;
        }

        .th_deg
        {
            background-color: skyblue;
        }

        .img_size
        {
            width: 200px;
            height: 100px;
        }
      
    </style>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

          <div>
            <h1 class="title_deg">All Orders</h1>

            <div style="padding-Left: 400px; padding-bottom: 30px;">

              <form action=" {{url('search')}}" method="get">

                @csrf

                <input type="text" style="color:black;" name="search" placeholder="Search for Something">
                <input type="submit" value="Search" class="btn btn-outline-primary">

              </form>

            </div>

            <table class="table_deg">

            <tr class="th_deg">

                <th style="padding: 10px;">Name</th>
                <th style="padding: 10px;">Email</th>
                <th style="padding: 10px;">Address</th>
                <th style="padding: 10px;">Phone</th>
                <th style="padding: 10px;">Product title</th>
                <th style="padding: 10px;">Quantity</th>
                <th style="padding: 10px;">Price</th>
                <th style="padding: 10px;">Payment Status</th>
                <th style="padding: 10px;">Delivery Status</th>
                <th style="padding: 10px;">Image</th>
                <th style="padding: 10px;">Pront PDF</th>

            </tr>

            @forelse($order as $order)

            <tr>
                <td>{{$order->name}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->product_title}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->payment_status}}</td>
                <td>{{$order->delivery_status}}</td>

                <td>

                <img class="img_size" src="/product/{{$order->image}}">
                
                </td>

                <td>

                @if(Sorder->delivery_status=='processing')

                <a href="({url( 'delivered',$order->id)}}" onclick="return confirm('Are you sure this product is delivered?')" class="btn btn-primary">Delivered</a>

                @else 
                <p style= "color: green;"> Delivered </p>

                @endif

                </td> 

                <td>

                  <a href="{{url('print_pdf', $order->id)}}" class="btn btn-secondary">Print PDF</a>
              
                </td>

            </tr>

            @empty

            <tr>

              <td colspan="16">
                No Data Found
              </td>
              
            </tr>

            @endforelse

            </table>

        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>