@extends('layout.model')

@section('axtar')
/clients
@endsection


@section('content')
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
          <span class="icon"><i class="mdi mdi-ballot"></i></span>
          {{ __('messages.clients') }}
        </p>
      </header>
      <div class="card-content">
        <form method="post" action="{{route('cgonder')}}" enctype="multipart/form-data">
            @csrf
          <div class="field">
            
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input class="input" type="text" placeholder="{{ __('messages.cname') }}" name="ad" required="">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div><br>


                <div class="control icons-left">
                  <input class="input" type="text" placeholder=" {{ __('messages.csur') }}" name="soyad" required="">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div><br>
                
                
                <div class="control icons-left">
                  <input class="input" type="text" placeholder=" {{ __('messages.tel') }}" name="tel" required="">
                  <span class="icon left"><i class="mdi mdi-phone"></i></span>
                </div><br>
                
                <div class="control icons-left">
                  <input class="input" type="text" placeholder="Email" name="email" required="">
                  <span class="icon left"><i class="mdi mdi-email-check"></i></span>
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
                <input type="file" name="Cfoto" required="">
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
          {{ __('messages.clients') }}
        </p>
      </header>
      <div class="card-content">
        <form method="post" action="{{route('cupdate',$edit->id)}}" enctype="multipart/form-data">
            @csrf
          <div class="field">
            
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input class="input" type="text" placeholder="{{ __('messages.cname') }}" value="{{$edit->ad}}" name="ad" required="">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div><br>


                <div class="control icons-left">
                  <input class="input" type="text" placeholder="{{ __('messages.csurname') }} " value="{{$edit->soyad}}" name="soyad" required="">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div><br>
                
                
                <div class="control icons-left">
                  <input class="input" type="text" placeholder="{{ __('messages.tel') }}" value="{{$edit->tel}}"  name="tel" required="">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div><br>
                
                <div class="control icons-left">
                  <input class="input" type="text" placeholder="Email" value="{{$edit->email}}" name="email" required="">
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
                <input type="file" name="Cfoto" required="">
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
              
              <a href="{{route('clients')}}" button type="submit" class="button red">
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
      <a href= "{{route('clients')}}"button class="button --jb-modal-close">{{ __('messages.imtina') }}</button></a>
      <a href="{{route('cyes',$sil_id)}}"button class="button red --jb-modal-close">{{ __('messages.beli') }}</button></a>
    </footer>
  </div>
</div>
@endisset




<div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
          {{ __('messages.clients') }}
        </p>
        <a href="{{route('clients')}}" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-update"></i></span>
        </a>
      </header>
      <div class="card-content">
        <table id='cedvel'>
          <thead>
          <tr>
          <th><a href="{{route('Cexport')}}">
            <span class="icon"><i class="mdi mdi-file-excel"></i></span></a></th>
            <th>{{ __('messages.foto') }}</th>
            <th>{{ __('messages.cname') }} , {{ __('messages.csur') }}</th>
            <th>{{ __('messages.tel') }}</th>
            <th>Email</th>
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
            <td><img src="{{url($info->Cfoto)}} " width="100" height="50"></td>
            <td>{{$info->ad}} {{$info->soyad}}</td>
            <td>{{$info->tel}}</td>
            <td>{{$info->email}}</td>
            <td>{{$info->created_at}}</td>
            <td class="actions-cell">
              <div class="buttons right nowrap">
              <a href="{{route('cedit',$info->id)}}"><button class="button small green --jb-modal"  type="button">
                  <span class="icon"><i class="mdi mdi-eye"></i></span>
                </button></a>
                <a href="{{route('csil',$info->id)}}"><button class="button small red --jb-modal" type="button">
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