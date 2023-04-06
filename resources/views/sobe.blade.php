@extends('layout.model')
@section('axtar')
/sobe
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
                  {{ __('messages.dep') }}
               </p>
            </header>
            <div class="card-content">
               <form method="post" action="{{route('Shgonder')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="field">
                     <label class="label">  {{ __('messages.dep') }}:</label>
                     <div class="field-body">
                        <div class="field">
                           <div class="control icons-left">
                              <input class="input" type="text" placeholder="{{ __('messages.dep') }}" name="ad" required="">
                              <span class="icon left"><i class="mdi mdi-bookmark"></i></span>
                           </div>
                        </div>
                        <hr>
                     </div>
                  </div>

                  <div class="field grouped">
                     <div class="control">
                        <button type="submit" class="button green">
                        {{ __('messages.cdep') }}
                        </button>
                     </div>
                  </div>       
               </form> 
            </div>
         </div>
      @endempty
      
    
   @isset($sil_id)
   <div id="sample-modal" class="modal active">
   <div class="modal-background --jb-modal-close"></div>
   <div class="modal-card">
      <header class="modal-card-head">
         <p class="modal-card-title"> {{ __('messages.del') }}</p>
      </header>
      <section class="modal-card-body">
         <p> {{ __('messages.sil') }}</p>
         
      </section>
      <footer class="modal-card-foot">
         <a href="{{route('sobe')}}" button class="button --jb-modal-close"> {{ __('messages.imtina') }}</button></a>
         <a href="{{route('Shyes',$sil_id)}}"button class="button red --jb-modal-close"> {{ __('messages.beli') }}</button></a>
      </footer>
   </div>
   </div>
   @endisset


   @isset($edit)
   <div class="card mb-6">
               <header class="card-header">
                  <p class="card-header-title">
                     <span class="icon"><i class="mdi mdi-ballot"></i></span>
                     {{ __('messages.dep') }}
                  </p>
               </header>
               <div class="card-content">
                  <form method="post" action="{{route('Shupdate',$edit->id)}}" enctype="multipart/form-data">
                     @csrf
                     <div class="field">
                        <label class="label"> {{ __('messages.dep') }}:</label>
                        <div class="field-body">
                           <div class="field">
                              <div class="control icons-left">
                                 <input class="input" type="text" value="{{$edit->ad}}" name="ad" required="">
                                 <span class="icon left"><i class="mdi mdi-account"></i></span>
                              </div>
                           </div>
                           <hr>
                        </div>
                     </div>

                     <div class="field grouped">
                        <div class="control">
                           <button type="submit" class="button green">
                           {{ __('messages.yenile') }}
                           </button>
                           <button type="submit" class="button red">
                           {{ __('messages.imtina') }}
                           </button>
                        </div>
                     </div>       
                  </form> 
               </div>
            </div>
   @endisset
   

   <br><br>
   <hr>
  
   <!--CEDVEL START-->
   <div class="card has-table">
         <header class="card-header">
         <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-bookmark-multiple"></i></span>
            {{ __('messages.dep') }}
         </p>
         <a href="{{route('sobe')}}" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-update"></i></span>
        </a>
         </header>
         <div class="card-content">
         <table id='cedvel'>
            <thead>
            <tr>
               <th><a href="{{route('Shexport')}}">
            <span class="icon"><i class="mdi mdi-file-excel"></i></span></a></th>
               <th>{{ __('messages.dep') }}</th>
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
                  <td>{{$i+=1}}.</td>
                  <td>{{$info->ad}}</td>
                  <td>{{$info->created_at}}</td>
                  <td class="actions-cell">
                  <div class="buttons right nowrap">
                     <a href="{{route('Shedit',$info->id)}}"><button class="button small green --jb-modal"  type="button">
                        <span class="icon"><i class="mdi mdi-eye"></i></span>
                        </button></a>
                     <a href="{{route('Shsil',$info->id)}}"><button class="button small red --jb-modal"  type="button">
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
 

@endsection