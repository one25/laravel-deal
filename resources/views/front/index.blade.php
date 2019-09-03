@extends('front.layout')

@section('css')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">
@endsection

@section('main')

<!-- brick-wrapper -->
<div class="bricks-wrapper">
<div class="row margin">
    <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="form-group">
           <button type="button" id="resetdates" class="btn btn-primary">@lang('Reset dates')</button>
        </div>
    </div>
</div>
<div class="row margin">
    <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="form-group">
            <label for="type" class="size">Date of start</label>
            <input type="text" name="date_start" id="datepicker" class="form-control f-verify input-size">
        </div>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="form-group">
            <label for="type" class="size">Date of end</label>
            <input type="text" name="date_end" id="datepicker1" class="form-control f-verify input-size">
        </div>
    </div> 
</div> 
<hr>

<div class="row margin">
    <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="form-group">
            <label for="type" class="size">Seller</label>
            <select class="form-control input-size" name="seller" id="seller">
                <option value="0" class="input-size" 
                   >-----</option>            
                @foreach ($sellers as $key => $seller)
                   <option value="{{ $seller->id }}" class="input-size" 
                   >@lang($seller->name)</option>
                @endforeach                                 
            </select>
        </div>
    </div>   
    <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="form-group">
            <label for="type" class="size">Buyer</label>
            <select class="form-control input-size" name="buyer" id="buyer">
                <option value="0" class="input-size" 
                   >-----</option>            
                @foreach ($buyers as $key => $buyer)
                   <option value="{{ $buyer->id }}" class="input-size" 
                   >@lang($buyer->name)</option>
                @endforeach                                 
            </select>
        </div>
    </div>           
</div>   

    <table>
       <thead>
        <tr>
          <td>
             <table>
               <tr>
                 <td rowspan="2">Date</td>
                 <td ><a href="#" class="sort" data-order="date" data-direction="asc">
                    <img src="{{ asset('public/images/top.jpg') }}" alt />
                 </a></td>
               </tr>
               <tr>   
                 <td><a href="#" class="sort" data-order="date" data-direction="desc">
                    <img src="{{ asset('public/images/bottom.jpg') }}" alt />
                 </a></td>  
               </tr>
             </table>                    
          </td>
          <td>Seller</td>                            
          <td>Buyer</td>
          <td>Name</td>
          <td>
             <table>
               <tr>
                 <td rowspan="2">Price</td>
                 <td><a href="#" class="sort" data-order="price" data-direction="asc">
                    <img src="{{ asset('public/images/top.jpg') }}" alt />
                 </a></td>
               </tr>
               <tr>
                 <td><a href="#" class="sort" data-order="price" data-direction="desc">
                    <img src="{{ asset('public/images/bottom.jpg') }}" alt />
                 </a></td>
               </tr>
             </table>                     
          </td>           
        </tr>  
        </thead>
        <tbody id="pannel">
           @include('front.brick-standard', compact('deals'))
        </tbody>    
        <tbody>
           <tr><td class="bolder">For all pages</td><td></td><td></td><td></td>
              <td id="pricesum" class="bolder">
                 {{ number_format((float)$pricesum, 2, '.', '') }} 
              </td>
           </tr>
        </tbody>        
     </table> 
     <hr> <!-- cards->links() -->
     <div id="pagination" class="box-footer">
       {{ $links }}
     </div>
</div>

</div> <!-- end row -->

@endsection

@section('js')
    <script src="{{ asset('public/js/mine.js') }}"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker({
              dateFormat: 'yy-mm-dd',
            });
            $("#datepicker1").datepicker({
              dateFormat: 'yy-mm-dd',
            });
        });
       var url = "{{ route('home') }}";
       var errorAjax = '@lang('Looks like there is a server issue...')';
       $(document).ready(function(){
          $('td a.sort').click(function () {
             BaseRecord.ordering(url, $(this), errorAjax);
             return false;
          });
          $("#datepicker, #datepicker1").change(function(){
             BaseRecord.dateselect(url, $("#datepicker"), $("#datepicker1"), errorAjax);
          });
          $("#resetdates").click(function(){
             $("#datepicker").val('');
             $("#datepicker1").val('');
             BaseRecord.dateselect(url, $("#datepicker"), $("#datepicker1"), errorAjax);
          });          
          $("#seller, #buyer").change(function(){
             BaseRecord.sellerbuyerselect(url, $(this), errorAjax);
          });                    
       });
    </script>
@endsection    
