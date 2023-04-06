@extends('layout.model')
@section('content')

@section('axtar')
/staff
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
            <span class="icon"><i class="mdi mdi-ballot"></i></span>
            {{ __('messages.staff') }}
         </p>
      </header>
      <div class="card-content">
         <form method="post" action="{{route('Sgonder')}}" enctype="multipart/form-data">
            @csrf
            <!--File upload START-->
            <div class="field">
            <label class="label">{{ __('messages.foto') }}:</label>
               <div class="field-body">
                  <div class="field file">
                     <label class="upload control">
                        <a class="button blue">
                        {{ __('messages.foto') }}
                        </a>
                        <input type="file" name="Sfoto" required="">
                     </label>
                  </div>
               </div>
            </div>
               <hr>
            <!--File upload END-->

            <div class="field">
               <label class="label">{{ __('messages.sname') }}:</label>
               <div class="field-body">
                  <div class="field">
                     <div class="control icons-left">
                        <input class="input" type="text" placeholder="{{ __('messages.sname') }}" name="ad" required="">
                        <span class="icon left"><i class="mdi mdi-account"></i></span>
                     </div>
                  </div>
                  <hr>
               </div>
            </div>

            <div class="field">
               <label class="label">{{ __('messages.ssurname') }}:</label>
               <div class="field-body">
                  <div class="field">
                     <div class="control icons-left">
                        <input class="input" type="text" placeholder="{{ __('messages.ssurname') }}..." name="soyad" required="">
                        <span class="icon left"><i class="mdi mdi-account"></i></span>
                     </div>
                  </div>
                  <hr>
               </div>
            </div>

            <div class="field">
               <label class="label">{{ __('messages.tel') }}:</label>
               <div class="field-body">
                  <div class="field">
                     <div class="control icons-left">
                        <input class="input" type="text" placeholder="(+994)xxx-xx-xx..." name="tel" required="">
                        <span class="icon left"><i class="mdi mdi-phone"></i></span>
                     </div>
                  </div>
                  <hr>
               </div>
            </div>

            <div class="field">
               <label class="label">Email:</label>
               <div class="field-body">
                  <div class="field">
                     <div class="control icons-left">
                        <input class="input" type="text" placeholder="...@gmail.com /...@mail.ru" name="email" required="">
                        <span class="icon left"><i class="mdi mdi-email"></i></span>
                     </div>
                  </div>
                  <hr>
               </div>
            </div>

            <label class="label"> {{ __('messages.ssec') }}:
                  <select name="sobe_id" required="">
                     <option value="">{{ __('messages.sech') }}...</option>
                        @foreach($sobe as $s)
                        <option value="{{$s->id}}">{{$s->ad}}</option>
                        @endforeach
                  </select></label> 
            

            <div class="field">
               <label class="label">{{ __('messages.vezife') }}:</label>
               <div class="field-body">
                  <div class="field">
                     <div class="control icons-left">
                        <input class="input" type="text" placeholder="{{ __('messages.vezife') }}.." name="vezife" required="">
                        <span class="icon left"><i class="mdi mdi-briefcase"></i></span>
                     </div>
                  </div>
                  <hr>
               </div>
            </div>

            <div class="field">
               <label class="label">{{ __('messages.maas') }}:</label>
               <div class="field-body">
                  <div class="field">
                     <div class="control icons-left">
                        <input class="input" type="text" placeholder="€ / $ / £ / ₼" name="maash" required="">
                        <span class="icon left"><i class="mdi mdi-account-cash"></i></span>
                     </div>
                  </div>
                  <hr>
               </div>
            </div>

            <div class="field">
               <label class="label">{{ __('messages.cre') }}:</label>
               <div class="field-body">
                  <div class="field">     
                        <input class="input" type="date" placeholder="00-00-000" name="vaxt" required=""> 
                  </div>
                  <hr>
               </div>
            </div>

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
   @endempty


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
         <a href="{{route('staff')}}" button class="button --jb-modal-close">{{ __('messages.imtina') }}</button></a>
         <a href="{{route('Syes',$sil_id)}}"button class="button red --jb-modal-close">{{ __('messages.yenile') }}</button></a>
      </footer>
   </div>
   </div>
   @endisset

   @isset($edit)
   <div class="card mb-6">
      <header class="card-header">
         <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-ballot"></i></span>
            {{ __('messages.staff') }}
         </p>
      </header>
      <div class="card-content">
         <form method="post" action="{{route('Supdate',$edit->id)}}" enctype="multipart/form-data">
            @csrf
            <!--File upload START-->
            <div class="field">
            <img src="{{url($edit->Sfoto)}}" width="150" height="150"><br>
               <div class="field-body">
                  <div class="field file">
                     <label class="upload control">
                        <a class="button blue">
                        {{ __('messages.foto') }}
                        </a>
                        <input type="file" name="Sfoto" >
                     </label>
                  </div>
               </div>
            </div>
               <hr>
            <!--File upload END-->
            <div class="field">
               <label class="label">{{ __('messages.sname') }}:</label>
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

            <div class="field">
               <label class="label">{{ __('messages.ssurname') }}:</label>
               <div class="field-body">
                  <div class="field">
                     <div class="control icons-left">
                        <input class="input" type="text" value="{{$edit->soyad}}" name="soyad" required="">
                        <span class="icon left"><i class="mdi mdi-account"></i></span>
                     </div>
                  </div>
                  <hr>
               </div>
            </div>

            <div class="field">
               <label class="label">{{ __('messages.tel') }}:</label>
               <div class="field-body">
                  <div class="field">
                     <div class="control icons-left">
                        <input class="input" type="text" value="{{$edit->tel}}" name="tel" required="">
                        <span class="icon left"><i class="mdi mdi-account"></i></span>
                     </div>
                  </div>
                  <hr>
               </div>
            </div>

            <div class="field">
               <label class="label">Email:</label>
               <div class="field-body">
                  <div class="field">
                     <div class="control icons-left">
                        <input class="input" type="text" value="{{$edit->email}}" name="email" required="">
                        <span class="icon left"><i class="mdi mdi-account"></i></span>
                     </div>
                  </div>
                  <hr>
               </div>
            </div>

            <label class="label">{{ __('messages.dep') }}:
                  <select name="sobe_id" required="">
                     <option value="">{{ __('messages.sech') }}</option>
                        @foreach($sobe as $s)
                        <option selected value="{{$s->id}}">{{$s->ad}}</option>
                        @endforeach
                  </select></label> 

            <div class="field">
               <label class="label">{{ __('messages.vezife') }}:</label>
               <div class="field-body">
                  <div class="field">
                     <div class="control icons-left">
                        <input class="input" type="text" value="{{$edit->vezife}}" name="vezife" required="">
                        <span class="icon left"><i class="mdi mdi-account"></i></span>
                     </div>
                  </div>
                  <hr>
               </div>
            </div>

            <div class="field">
               <label class="label">{{ __('messages.maas') }}:</label>
               <div class="field-body">
                  <div class="field">
                     <div class="control icons-left">
                        <input class="input" type="text" value="{{$edit->maash}}" name="maash" required="">
                        <span class="icon left"><i class="mdi mdi-account"></i></span>
                     </div>
                  </div>
                  <hr>
               </div>
            </div>

            <div class="field">
               <label class="label">{{ __('messages.cre') }}:</label>
               <div  class="field-body">
                  <div class="field">
                     <div class="control icons-left">
                     <input class="input" type="date" value="{{$edit->vaxt}}" name="vaxt" required="">
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
            

                  <a href="{{route('staff')}}" button type="button" class="button red">
                  {{ __('messages.imtina') }}
                  </button></a>
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
         <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
         {{ __('messages.staff') }}
      </p>
      <a href="{{route('staff')}}" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-update"></i></span>
        </a>
      </header>
      <div class="card-content">
      <table id='cedvel'>
            <thead>
               <tr>
                  <th><a href="{{route('Sexport')}}">
            <span class="icon"><i class="mdi mdi-file-excel"></i></span></a></th>
                  <th>{{ __('messages.foto') }}</th>
                  <th>{{ __('messages.sname') }}</th>
                  <th>{{ __('messages.ssurname') }}</th>
                  <th>{{ __('messages.tel') }}</th>
                  <th>Email</th>
                  <th>{{ __('messages.dep') }}</th>
                  <th>{{ __('messages.vezife') }}</th>
                  <th>{{ __('messages.maas') }}</th>
                  <th>{{ __('messages.cre') }}</th>
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
                  <td><img src="{{url($info->Sfoto)}}" width="100" height="50"></td>
                  <td>{{$info->add}}</td>
                  <td>{{$info->soyad}}</td>
                  <td>{{$info->tel}}</td>
                  <td>{{$info->email}}</td>
                  <td>{{$info->ad}}</td>  
                  <td>{{$info->vezife}}</td>
                  <td>{{$info->maash}}</td>
                  <td>{{$info->vaxt}}</td>
                  <td class="actions-cell">
                  <div class="buttons right nowrap">
                     <a href="{{route('Sedit',$info->id)}}"><button class="button small green --jb-modal" type="button">
                        <span class="icon"><i class="mdi mdi-eye"></i></span>
                        </button></a>
                     <a href="{{route('Ssil',$info->id)}}"><button class="button small red --jb-modal" type="button">
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