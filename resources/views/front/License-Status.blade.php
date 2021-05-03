@extends('front.layouts.master1')
@section('content')
<br>
<div class="container">
    <h3 class="text-center text-primary">BEST_R SYSTEM</h3>
    <p class="text-center">Department of Trade</p>
    <hr class="bg-warning">
    <br><br>
    
    <div class="container text-center">
        <a href="{{url('/rules')}}" class="w-50 mt-5">RULES AND REGULATIONS</a>
    </div>
    <br>
    <div class="row">
        <div class="offset-2">
          <table class="table table-responsive table-bordered">
            <thead class="table-dark text-center">
              <tr>
                <th scope="col">Violation Date & Time</th>
              </tr>
          </thead>
          @include('admin.layouts.message')
          <tbody>
              @foreach ($status as $status)
              <tr>  
                 <td>{{ $status->Issued_at}}</td>     
              </tr>
              @endforeach
            
          </tbody>
        </table>
</div>
</div>
</div>   

<style>
    a{
            display: inline-block;
            padding: 20px 0px;
            text-align: center;
            position: relative;
            text-decoration: none;
            border-radius: 30px 0 30px 0;
            background:linear-gradient(45deg, #0162c8,#55effc);
            font-size: 16px;
            color: aliceblue;
            font-weight: bold;
    }

    a:hover{
            color: #ecf0f1;
    }
</style>

   @endsection


