@extends('layout.model')
@section('content')

@section('axtar')
/orders
@endsection





<section class="section main-section">
@if(session('mesaj'))
    <div class="notification blue">
          <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
            <div>
              <span class="icon"><i class="mdi mdi-account-edit"></i></span>
              <b>{{session('mesaj')}}</b>
            </div>
            <button type="button" class="button small textual --jb-notification-dismiss">Bağla</button>
          </div>
        </div>
    @endif
    @if(session('mesaj2'))
    <div class="notification red">
          <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
            <div>
              <span class="icon"><i class="mdi mdi-alert"></i></span>
              <b>{{session('mesaj2')}}  </b>
            </div>
            <button type="button" class="button small textual --jb-notification-dismiss">Bağla</button>
          </div>
        </div>
    @endif


    @if(session('mesaj3'))
    <div class="notification green">
          <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
            <div>
              <span class="icon"><i class="mdi mdi-hand-okay"></i></span>
              <b>{{session('mesaj3')}}</b>
            </div>
            <button type="button" class="button small textual --jb-notification-dismiss">Bağla</button>
          </div>
        </div>
    @endif




@isset($sil_id)
<div id="sample-modal" class="modal active">
  <div class="modal-background --jb-modal-close"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Sil</p>
    </header>
    <section class="modal-card-body">
      <p><b>{{$sildata->ad}} {{$sildata->soyad}}</b> {{ __('messages.osil') }}</p>
      
    </section>
    <footer class="modal-card-foot">
      <a href= "{{route('orders')}}"button class="button --jb-modal-close">Cancel</button></a>
      <a href="{{route('orders_delete',$sil_id)}}"button class="button red --jb-modal-close">Confirm</button></a>
    </footer>
  </div>
</div>
@endisset

@empty($edit)
    <div class="card mb-6">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-bookmark-outline"></i></span>
          {{ __('messages.orders') }}
        </p>
      </header>
      <div class="card-content">
      <form method="post" action="{{route('orders_insert')}}">
            @csrf
          <div class="field">
       
            <div class="field-body">
              <div class="field">
                
            
              <div class="control icons-left">
                <select name="client_id" required="">
                    <option value="">{{ __('messages.musterisec') }}</option>

                    @foreach($clients as $client)
                    <option value="{{$client->id}}">{{$client->ad}} {{$client->soyad}}</option>
                    @endforeach
                
                </select>
                </div><br>



                <div class="control icons-left">
                <select name="product_id" required="">
                    <option value="">{{ __('messages.prsec') }}</option>
                    @foreach($products as $product)
                    <option value="{{$product->id}}">{{$product->ad}} - {{$product->mehsul}} [{{$product->miqdar}}]</option>
                    @endforeach
                </select><br>
                </div><br>


                
                
                <div class="control icons-left">
                  <input class="input" type="text" placeholder="{{ __('messages.miq') }}" name="miqdar" required="">
                  <span class="icon left"><i class="mdi mdi-counter"></i></span>
                </div>
              </div>
              <hr>
          <hr>

          <div class="field grouped">
            <div class="control">
              <button type="submit" class="button green">
              {{ __('messages.enter') }}
              </button>
            </div>
            
          </div>
        </form>
      </div>
    </div>
      </div>
    </div>

@endempty

<center>


   <br>

   

      <b>Müştəri: {{count($clients)}} </b>  | 
      <b>Sifariş: {{count($orders)}} </b>   | 
      <b>Məhsul: {{count($products)}} </b>  | 
      <b>Alish: {{$alis}}</b>  |
      <b>Satish: {{$satis}} </b>  |
      <b>Qazanc: {{$qazanc}}</b> |
      <b>Xerc: {{collect($xerc)->sum('mebleg')}} </b>|
      <b>Cari qazanc: {{$cari}}</b> 
      <br><br>

</center>

<table id="cedvel">
          <thead>
          <tr>
            <th><a href="{{route('Oexport')}}">
            <span class="icon"><i class="mdi mdi-file-excel"></i></span></a></th>
            <th>{{ __('messages.foto') }}</th>
            <th>{{ __('messages.clients') }}</th>
            <th>{{ __('messages.brands') }}</th>
            <th>{{ __('messages.products') }}</th>
            <th>{{ __('messages.alish') }}</th>
            <th>{{ __('messages.satish') }}</th>
            <th>{{ __('messages.stok') }}</th>
            <th>{{ __('messages.miq') }}</th>
            <th>{{ __('messages.tarix') }}</th>
            <th></th>
          </tr>
          </thead>
          <tbody>

@isset($edit)
<div class="card mb-6">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-ballot"></i></span>
          {{ __('messages.orders') }}
        </p>
      </header>
      <div class="card-content">
      <form method="post" action="{{route('orders_update',$edit->id)}}">
            @csrf
          <div class="field">
            <label class="label"></label>
            <div class="field-body">
              <div class="field">
                
                        
                <select name="client_id" required="">
                    <option value="">{{ __('messages.cqazanc') }}</option>

                    @foreach($clients as $client)

                        @if($client->id==$edit->client_id)
                        <option selected value="{{$client->id}}">{{$client->ad}} {{$client->soyad}}</option>
                        @else
                        <option value="{{$client->id}}">{{$client->ad}} {{$client->soyad}}</option>
                        @endif

                    @endforeach
                
                </select><br><br>



                                
                
                    <select name="product_id" required="">
                        <option value="">{{ __('messages.musterisec') }}</option>
                        @foreach($products as $product)

                        @if($product->id==$edit->product_id)
                        <option selected value="{{$product->id}}">{{$product->ad}} - {{$product->mehsul}} [{{$product->miqdar}}]</option>
                        @else
                        <option value="{{$product->id}}">{{$product->ad}} - {{$product->mehsul}} [{{$product->miqdar}}]</option>
                        @endif

                        @endforeach
                    </select><br><br>

                
                
                <div class="control icons-left">
                  <input class="input" type="text" placeholder="{{ __('messages.miq') }}" value="{{$edit->miqdar}}" name="miqdar" required="">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
              <hr>
          <hr>

          <div class="field grouped">
            <div class="control">
              <button type="submit" class="button green">
              {{ __('messages.yenile') }}
              </button>
              <a href="{{route('orders')}}" button type="submit" class="button red">
              {{ __('messages.imtina') }}
              </button></a>
            </div>
            
          </div>
        </form>
      </div>
    </div>
      </div>
    </div>

@endisset




<br>

<div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-bookmark-outline"></i></span>
          {{ __('messages.orders') }}
        </p>
        <a href="{{route('orders')}}" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-update"></i></span>
        </a>
      </header>
      <div class="card-content">
 

      @empty($edit)
          @empty($sil_id)
          @php
          $i = ($orders->currentpage() * 5) - 5
          @endphp
          @foreach($orders as $info)

              
            
            <tr>

            <td>{{$i+=1}}</td>
            <td><img src="{{url($info->Cfoto)}} " width="70" height="60"></td>
            <td>{{$info->client}} {{$info->soyad}}</td>
            <td>{{$info->brand}}</td>
            <td>{{$info->mehsul}}</td>
            <td>{{$info->alis}}</td>
            <td>{{$info->satis}}</td>
            <td>{{$info->stok}}</td>
            <td>{{$info->miqdar}}</td>
            <td>{{$info->created_at}}</td>
            <td class="actions-cell">
              
            @if($info->Otesdiq==0)
            <div class="buttons right nowrap">
              <a href="{{route('orders_edit',$info->id)}}"><button class="button small green --jb-modal"   type="button">
                  <span class="icon"><i class="mdi mdi-eye"></i></span>
                </button></a>

                <a href="{{route('Otesdiq',$info->id)}}"><button class="button small green --jb-modal" type="button">
                  <span class="icon"><i class="mdi mdi-account-check"></i></span>
                </button></a>



                <a href="{{route('orders_sil',$info->id)}}"><button class="button small red --jb-modal" type="button">
                  <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                </button></a>
              </div>
            </td>
            @else
            <a href="{{route('Oimtina',$info->id)}}"><button class="button small red --jb-modal"  type="button">
                  <span class="icon"><i class="mdi mdi-eye"></i></span>
                </button></a>


            @endif
         
            </tr>

            @endforeach

          </tbody>
        </table>
        <div class="table-pagination">
              <div class="flex items-center justify-between">
                <div class="buttons">
      
                </div>
                {!! $orders->links() !!}
              </div>
            </div>
          @endempty
          @endempty
      </div>
    </div>
</section>






