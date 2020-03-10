<template>
   <li class="nav-item dropdown">
       <div class="btn-group" role="group">
            <a href="/notificaciones" data-toggle="dropdown">
                <button id="btnGroupDrop1" type="button" class="btn boton-notificaciones" aria-haspopup="true" aria-expanded="false">
                    Notificaciones
                    <span class="badge badge-light" v-text="notifications.length"></span>
                </button>
            </a>
       <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">

        <ul class="dropdown-item">
            <li v-for="notification in notifications">
                <a @click="markAsRead(notification)" :href="notification.data.link" v-text="notification.data.username+' '+notification.data.userlastname+' '+notification.data.subject"></a>
            </li>
        </ul>

<!--
       @if(Auth::user()->unreadNotifications->count()<1)
       <a class="dropdown-item" href="#">No hay notificaciones</a>
       @else
       @foreach(Auth::user()->unreadNotifications as $notificacion)
         <a class="dropdown-item" href="/notifications">
           {{$notificacion->data['username']}} {{$notificacion->data['userlastname']}} {{$notificacion->data['subject']}}</a>

           {{-- onclick="{{$notificacion->markAsRead()}}" --}}

       @endforeach
       @endif -->

       </div>
     </div>
   </li>
</template>

<script>
    export default {
        data(){
            return {
                notifications: []
            }
        },

        mounted() {
            axios.get('notificaciones').then(res => {
                this.notifications =res.data;
            })
        },

        methods: {
            markAsRead(notification){
                axios.patch('/notificaciones/' + notification.id);
            }
        }
    }
</script>
