
@extends('layout.model')
@section('axtar')
/products
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



@empty($edit)
    <div class="card mb-6">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
          {{ __('messages.products') }} 
        </p>
      </header>
      <div class="card-content">
      <form method="post" action="{{route('pgonder')}}" enctype="multipart/form-data">
            @csrf
          <div class="field">
            
            <div class="field-body">
              <div class="field">
                
            
              <div class="control icons-left">
              <select name="brand_id" required="">
                    <option value="">{{ __('messages.bsec') }} </option>
                    @foreach($brands as $brand)
                        <option value="{{$brand->id}}">{{$brand->ad}}</option>{{$brand->id}} 
                    @endforeach
                </select>
                </div><br>



              <div class="control icons-left">
                  <input class="input" type="text" placeholder="{{ __('messages.pname') }}" name="mehsul" required="">
                  <span class="icon left"><i class="mdi mdi-ab-testing"></i></span>
                </div><br>


                <div class="control icons-left">
                  <input class="input" type="text" placeholder="{{ __('messages.alish') }}" name="alis" required="">
                  <span class="icon left"><i class="mdi mdi-cash-multiple"></i></span>
                </div><br>
                
                
                <div class="control icons-left">
                  <input class="input" type="text" placeholder="{{ __('messages.satish') }}" name="satis" required="">
                  <span class="icon left"><i class="mdi mdi-cash-multiple"></i></span>
                </div><br>
                
                <div class="control icons-left">
                  <input class="input" type="text" placeholder="{{ __('messages.miq') }}" name="miqdar" required="">
                  <span class="icon left"><i class="mdi mdi-counter"></i></span>
                </div>
              </div>
              <hr>

        <div class="field">
          <label class="label">{{ __('messages.foto') }}</label>
          <div class="field-body">
            <div class="field file">
              <label class="upload control">
                <a class="button blue">
                {{ __('messages.upload') }}
                </a>
                <input type="file" name="Pfoto" required="">
              </label>
            </div>
          </div>
        </div>


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




   

@isset($edit)

<div class="card mb-6">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-ballot"></i></span>
          {{ __('messages.products') }}
        </p>
      </header>
      <div class="card-content" >
      <form method="post" action="{{route('pupdate',$edit->id)}}" enctype="multipart/form-data">
            @csrf
          <div class="field" >
            <label class="label"></label>
            <div class="field-body">
              <div class="field">
                
            
              <div class="control icons-left">
                <select name="brand_id" required="">
                    <option value="">{{ __('messages.bsec') }}</option>
                    @foreach($brands as $brand)
                    @if($edit->brand_id==$brand->id)
                    <option selected value="{{$brand->id}}">{{$brand->ad}}</option>
                    @else
                    <option value="{{$brand->id}}">{{$brand->ad}}</option>
                    @endif
                    @endforeach
                </select>
                </div><br>



              <div class="control icons-left">
                  <input class="input" type="text" placeholder="{{ __('messages.pname') }}" value="{{$edit->mehsul}}" name="mehsul" required="">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div><br>


                <div class="control icons-left">
                  <input class="input" type="text" placeholder="{{ __('messages.alish') }}" name="alis" value="{{$edit->alis}}" required="">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div><br>
                
                
                <div class="control icons-left">
                  <input class="input" type="text" placeholder="{{ __('messages.satish') }}" name="satis" value="{{$edit->satis}}" required="">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div><br>
                
                <div class="control icons-left">
                  <input class="input" type="text" placeholder="{{ __('messages.miq') }}" name="miqdar" value="{{$edit->miqdar}}" required="">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>
              <hr>

        <div class="field">
          <label class="label">{{ __('messages.foto') }}</label>
          <div class="field-body">
            <div class="field file">
              <label class="upload control">
                <a class="button blue">
                {{ __('messages.upload') }}
                </a>
                <input type="file" name="Pfoto">
              </label>
            </div>
          </div>
        </div>


          <hr>

          <div class="field grouped">
            <div class="control">
              <button type="submit" class="button green">
              {{ __('messages.yenile') }}
              </button>
              <a href="{{route('products')}}" button type="submit" class="button red">
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




@isset($sil_id)
<div id="sample-modal" class="modal active">
  <div class="modal-background --jb-modal-close"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">{{ __('messages.del') }}</p>
    </header>
    <section class="modal-card-body">
      <p>{{ __('messages.sil') }}</p>
      
    </section>
    <footer class="modal-card-foot">
      <a href= "{{route('products')}}"button class="button --jb-modal-close">{{ __('messages.imtina') }}</button></a>
      <a href="{{route('pyes',$sil_id)}}"button class="button red --jb-modal-close">{{ __('messages.beli') }}</button></a>
    </footer>
  </div>
</div>
@endisset



<div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
          {{ __('messages.products') }}
        </p>
        <a href="{{route('products')}}" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-update"></i></span>
        </a>
      </header>
      <div class="card-content">
        <table id='cedvel'>
          <thead>
          <tr>
            <th><a href="{{route('Pexport')}}">
            <span class="icon"><i class="mdi mdi-file-excel"></i></span></a></th>
            <th>{{ __('messages.foto') }}</th>
            <th>{{ __('messages.brands') }}</th>
            <th>{{ __('messages.products') }}</th>
            <th>{{ __('messages.alish') }}</th>
            <th>{{ __('messages.satish') }}</th>
            <th>{{ __('messages.miq') }}</th>
            <th>{{ __('messages.tarix') }}</th>
            <th></th>
          </tr>
          </thead>
          <tbody>

          @empty($edit)
          @empty($sil_id)
          @php
          $i = ($data->currentpage() * 5) - 5
          @endphp
          @foreach($data as $info)
          


              
            
            <tr>

            <td>{{$i+=1}}</td>
            <td><img src="{{url($info->Pfoto)}} " width="100" height="50"></td>
            <td>{{$info->ad}}</td>
            <td>{{$info->mehsul}}</td>
            <td>{{$info->alis}}</td>
            <td>{{$info->satis}}</td>
            <td>{{$info->miqdar}}</td>
            <td>{{$info->created_at}}</td>
            <td class="actions-cell">
              <div class="buttons right nowrap">
              <a href="{{route('pedit',$info->id)}}"><button class="button small green --jb-modal"  type="button">
                  <span class="icon"><i class="mdi mdi-eye"></i></span>
                </button></a>
                <a href="{{route('psil',$info->id)}}"><button class="button small red --jb-modal" type="button">
                  <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                </button></a>
              </div>
            </td>
         
            </tr>

            @endforeach

          </tbody>
        </table>
        <div class="table-pagination">
              <div class="flex items-center justify-between">
                <div class="buttons">
      
                </div>
                {!! $data->links() !!}
              </div>
            </div>
          @endempty
          @endempty
      </div>
    </div>
</section>

