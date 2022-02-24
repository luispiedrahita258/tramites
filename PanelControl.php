<?php
// Incluimos el archivo conexión
require_once('db/conexion.php');
require_once('db/clase.php');
// Instancia del objeto classe Login
$objLogin = new Login();

// Verificamos si esta logueado, caso contrario será redireccionado a la página de login
if (!$objLogin->verificar('index.php'))
    // Cerramos la verificacion
    exit;

// Selecionamos informacion del usuario desde MySQL
$query = mysqli_query($conectar,"SELECT * FROM usuario WHERE id_usuario = {$objLogin->getID()}");
$usuario = mysqli_fetch_object($query);
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Inicio</title>
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/sticky-footer-navbar.css" rel="stylesheet">
<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.form.js'></script>
<link rel="stylesheet" type="text/css" href="css/main.css" />

  <link href="datatables/datatables.min.css" rel="stylesheet">
  <link href="clockpicker/dist/bootstrap-clockpicker.min.css" rel="stylesheet">
  <link href="fullcalendar-4.3.1/packages/core/main.css" rel="stylesheet">
  <link href="fullcalendar-4.3.1/packages/daygrid/main.css" rel="stylesheet">
  <link href="fullcalendar-4.3.1/packages/timegrid/main.css" rel="stylesheet">
  <link href="fullcalendar-4.3.1/packages/list/main.css" rel="stylesheet">
  <link href="fullcalendar-4.3.1/packages/bootstrap/main.css" rel="stylesheet">
<script type="text/javascript">
        // inicia funcion cuando carga la página
        $(function($) {
            // Cuando envia desde formulário
            $('#frmLogin').submit(function() {
                // Limpiando los mensajes de error
                $('div.mensagem-erro').html('');
                // Mostrando carga
                $('div.loader').show();
                // Enviando informacion via AJAX
                $(this).ajaxSubmit(function(respuesta) {
                    // Si no hay error mostrar el siguiente archivo
                    if (!respuesta)
                        // Redirecionando para o painel
                        window.location.href = 'PanelControl.php';
                    else
                    {
                        // Encondiendo la carga con hide()
                        $('div.loader').hide();
                        // Exibimos mensaje de error
                        $('div.mensagem-erro').html(respuesta);
                    }
                });
                // Retornando false
                return false;
            });
        });
        </script>
  </head>

  <body>

    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Luis</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
            </li>  
            <li class="nav-item active">
              <a class="nav-link" href="PanelControl.php">Panel de Control</a>
            </li>  
                  
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Busqueda</button>
          </form>
        </div>
      </nav>
    </header>

    <!-- Begin page content -->

<div class="container">
 <h1 class="mt-5">Panel de Control</h1>
 <hr>
<div class="row">
  <div class="col-12 col-md-6">
   <!-- Contenido --> 

        <p>Bienvenido<strong> <?php echo $objLogin->getNombres() ?></strong></p>

      <h4>Mis datos de Usuario</h4>

        <ul>
            <li><strong>ID:</strong> <?php echo $objLogin->getID() ?></li>
            <li><strong>Usuario:</strong> <?php echo $objLogin->getLogin() ?></li>
            <li><strong>Nombres:</strong> <?php echo $objLogin->getNombres() ?></li>
        </ul>

        <a class="btn btn-danger" href="CerrarSesion.php">Cerrar Sesión</a>
<!-- Fin Contenido --> 
</div>
</div><!-- Fin row --><br>
<div class="container-fluid">
    <section class="content-header">
      <h1>
        Calendario
        <small>Panel de control</small>
      </h1>
    </section>

    <div class="row">

      <div class="col-10">
        <div id="Calendario1" style="border: 1px solid #000;padding:2px"></div>
      </div>

      <div class="col-2">
        <div id='external-events' style="margin-bottom:1em; height: 350px; border: 1px solid #000; overflow: auto;padding:1em">
          <h4 class="text-center">Eventos predefinidos</h4>
          <div id='listaeventospredefinidos'>

            <?php
            require("db/class_conexion.php");
            $conexion = retornarConexion();
            $datos = mysqli_query($conexion, "SELECT codigo,titulo,horainicio,horafin,colortexto,colorfondo FROM eventospredefinidos");
            $ep = mysqli_fetch_all($datos, MYSQLI_ASSOC);
            foreach ($ep as $fila)
              echo "<div class='fc-event' data-titulo='$fila[titulo]' data-horafin='$fila[horafin]' data-horainicio='$fila[horainicio]' 
                    data-colorfondo='$fila[colorfondo]' data-colortexto='$fila[colortexto]' data-codigo='$fila[codigo]'
                    style='border-color:$fila[colorfondo];color:$fila[colortexto];background-color:$fila[colorfondo];margin:10px'>
                    $fila[titulo]  [" . substr($fila['horainicio'], 0, 5) . " a " . substr($fila['horafin'], 0, 5) . "]</div>";

            ?>
          </div>
        </div>
        <hr>
        <div style="text-align:center"><button type="button" id="BotonEventosPredefinidos" class="btn btn-success">Administrar eventos predefinidos</button>
        </div>
      </div>

    </div>
  </div><br>
  <!-- FormularioEventos -->
  <div class="modal fade" id="FormularioEventos" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">


          <input type="hidden" id="Codigo">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Título del evento:</label>
              <input type="text" id="Titulo" class="form-control" placeholder="">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Fecha de inicio:</label>

              <div class="input-group" data-autoclose="true">
                <input type="date" id="FechaInicio" value="" class="form-control" />
              </div>
            </div>
            <div class="form-group col-md-6" id="TituloHoraInicio">
              <label>Hora de inicio:</label>

              <div class="input-group clockpicker" data-autoclose="true">
                <input type="text" id="HoraInicio" value="" class="form-control" autocomplete="off" />
              </div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Fecha de fin:</label>

              <div class="input-group" data-autoclose="true">
                <input type="date" id="FechaFin" value="" class="form-control" />
              </div>
            </div>
            <div class="form-group col-md-6" id="TituloHoraFin">
              <label>Hora de fin:</label>

              <div class="input-group clockpicker" data-autoclose="true">
                <input type="text" id="HoraFin" value="" class="form-control" autocomplete="off" />
              </div>
            </div>
          </div>

          <div class="form-group">
            <label>Descripción:</label>
            <textarea id="Descripcion" rows="3" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label>Color de fondo:</label>
            <input type="color" value="#3788D8" id="ColorFondo" class="form-control" style="height:36px;">
          </div>
          <div class="form-group">
            <label>Color de texto:</label>
            <input type="color" value="#ffffff" id="ColorTexto" class="form-control" style="height:36px;">
          </div>

        </div>
        <div class="modal-footer">

          <button type="button" id="BotonAgregar" class="btn btn-success">Agregar</button>
          <button type="button" id="BotonModificar" class="btn btn-success">Modificar</button>
          <button type="button" id="BotonBorrar" class="btn btn-success">Borrar</button>
          <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>

        </div>
      </div>
    </div>
  </div>

</div><!-- Fin container -->
    <footer class="footer">
      <div class="container">
        <span class="text-muted"><p>Actividad<a href="https://www.baulphp.com/" target="_blank">6</a></p></span>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="datatables/datatables.min.js"></script>
  <script src="clockpicker/dist/bootstrap-clockpicker.js"></script>
  <script src='js/moment-with-locales.min.js'></script>
  <script src='fullcalendar-4.3.1/packages/core/main.js'></script>
  <script src='fullcalendar-4.3.1/packages/daygrid/main.js'></script>
  <script src='fullcalendar-4.3.1/packages/timegrid/main.js'></script>
  <script src='fullcalendar-4.3.1/packages/interaction/main.js'></script>
  <script src='fullcalendar-4.3.1/packages/list/main.js'></script>
  <script src='fullcalendar-4.3.1/packages/core/locales/es.js'></script>
  <script src='fullcalendar-4.3.1/packages/bootstrap/main.js'></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {

      $('.clockpicker').clockpicker();

      let calendario1 = new FullCalendar.Calendar(document.getElementById('Calendario1'), {
        plugins: ['dayGrid', 'timeGrid', 'interaction'],
        height: 800,
        droppable: true,
        locale: 'es',
        showNonCurrentDates: false,
        header: {
          left: 'today,prev,next',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        editable: true,
        events: 'datoseventos.php?accion=listar',
        dateClick: function(info) {
          limpiarFormulario();
          $('#BotonAgregar').show();
          $('#BotonModificar').hide();
          $('#BotonBorrar').hide();
          if (info.allDay) {
            $('#FechaInicio').val(info.dateStr);
            $('#FechaFin').val(info.dateStr);
          } else {
            let fechaHora = info.dateStr.split("T");
            $('#FechaInicio').val(fechaHora[0]);
            $('#FechaFin').val(fechaHora[0]);
            $('#HoraInicio').val(fechaHora[1].substring(0, 5));
          }
          $("#FormularioEventos").modal();
        },
        eventClick: function(info) {
          $('#BotonModificar').show();
          $('#BotonBorrar').show();
          $('#BotonAgregar').hide();
          $('#Codigo').val(info.event.id);
          $('#Titulo').val(info.event.title);
          $('#Descripcion').val(info.event.extendedProps.descripcion);
          $('#FechaInicio').val(moment(info.event.start).format("YYYY-MM-DD"));
          $('#FechaFin').val(moment(info.event.end).format("YYYY-MM-DD"));
          $('#HoraInicio').val(moment(info.event.start).format("HH:mm"));
          $('#HoraFin').val(moment(info.event.end).format("HH:mm"));
          $('#ColorFondo').val(info.event.backgroundColor);
          $('#ColorTexto').val(info.event.textColor);
          $("#FormularioEventos").modal();
        },
        eventResize: function(info) {
          $('#Codigo').val(info.event.id);
          $('#Titulo').val(info.event.title);
          $('#FechaInicio').val(moment(info.event.start).format("YYYY-MM-DD"));
          $('#FechaFin').val(moment(info.event.end).format("YYYY-MM-DD"));
          $('#HoraInicio').val(moment(info.event.start).format("HH:mm"));
          $('#HoraFin').val(moment(info.event.end).format("HH:mm"));
          $('#ColorFondo').val(info.event.backgroundColor);
          $('#ColorTexto').val(info.event.textColor);
          $('#Descripcion').val(info.event.extendedProps.descripcion);
          let registro = recuperarDatosFormulario();
          modificarRegistro(registro);
        },
        eventDrop: function(info) {
          $('#Codigo').val(info.event.id);
          $('#Titulo').val(info.event.title);
          $('#FechaInicio').val(moment(info.event.start).format("YYYY-MM-DD"));
          $('#FechaFin').val(moment(info.event.end).format("YYYY-MM-DD"));
          $('#HoraInicio').val(moment(info.event.start).format("HH:mm"));
          $('#HoraFin').val(moment(info.event.end).format("HH:mm"));
          $('#ColorFondo').val(info.event.backgroundColor);
          $('#ColorTexto').val(info.event.textColor);
          $('#Descripcion').val(info.event.extendedProps.descripcion);
          let registro = recuperarDatosFormulario();
          modificarRegistro(registro);
        },
        drop: function(info) {
          limpiarFormulario();
          $('#ColorFondo').val(info.draggedEl.dataset.colorfondo);
          $('#ColorTexto').val(info.draggedEl.dataset.colortexto);
          $('#Titulo').val(info.draggedEl.dataset.titulo);
          let fechaHora = info.dateStr.split("T");
          $('#FechaInicio').val(fechaHora[0]);
          $('#FechaFin').val(fechaHora[0]);
          if (info.allDay) { //verdadero si el calendario esta en vista de mes
            $('#HoraInicio').val(info.draggedEl.dataset.horainicio);
            $('#HoraFin').val(info.draggedEl.dataset.horafin);
          } else {
            $('#HoraInicio').val(fechaHora[1].substring(0, 5));
            $('#HoraFin').val(moment(fechaHora[1].substring(0, 5)).add(1, 'hours'));
          }
          let registro = recuperarDatosFormulario();
          agregarEventoPredefinido(registro);
        }
      });

      calendario1.render();


      new FullCalendarInteraction.Draggable(document.getElementById('listaeventospredefinidos'), {
        itemSelector: '.fc-event',
        eventData: function(eventEl) {
          return {
            title: eventEl.innerText.trim()
          }
        }
      });

      //Eventos de botones de la aplicación
      $('#BotonAgregar').click(function() {
        let registro = recuperarDatosFormulario();
        agregarRegistro(registro);
        $("#FormularioEventos").modal('hide');
      });

      $('#BotonModificar').click(function() {
        let registro = recuperarDatosFormulario();
        modificarRegistro(registro);
        $("#FormularioEventos").modal('hide');
      });

      $('#BotonBorrar').click(function() {
        let registro = recuperarDatosFormulario();
        borrarRegistro(registro);
        $("#FormularioEventos").modal('hide');
      });

      $('#BotonEventosPredefinidos').click(function() {
        window.location = "eventospredefinidos.html";
      });


      // funciones para comunicarse con el servidor via ajax
      function agregarRegistro(registro) {
        $.ajax({
          type: 'POST',
          url: 'datoseventos.php?accion=agregar',
          data: registro,
          success: function(msg) {
            calendario1.refetchEvents();
          },
          error: function(error) {
            alert("Hay un problema:" + error);
          }
        });
      }

      function modificarRegistro(registro) {
        $.ajax({
          type: 'POST',
          url: 'datoseventos.php?accion=modificar',
          data: registro,
          success: function(msg) {
            calendario1.refetchEvents();
          },
          error: function(error) {
            alert("Hay un problema:" + error);
          }
        });
      }

      function borrarRegistro(registro) {
        $.ajax({
          type: 'POST',
          url: 'datoseventos.php?accion=borrar',
          data: registro,
          success: function(msg) {
            calendario1.refetchEvents();
          },
          error: function(error) {
            alert("Hay un problema:" + error);
          }
        });
      }

      function agregarEventoPredefinido(registro) {
        $.ajax({
          type: 'POST',
          url: 'datoseventos.php?accion=agregar',
          data: registro,
          success: function(msg) {
            calendario1.removeAllEvents();
            calendario1.refetchEvents();
          },
          error: function(error) {
            alert("Hay un problema:" + error);
          }
        });
      }

      // funciones que interactuan con el formulario de entrada de datos
      function limpiarFormulario() {
        $('#Codigo').val('');
        $('#Titulo').val('');
        $('#Descripcion').val('');
        $('#FechaInicio').val('');
        $('#FechaFin').val('');
        $('#HoraInicio').val('');
        $('#HoraFin').val('');
        $('#ColorFondo').val('#3788D8');
        $('#ColorTexto').val('#ffffff');

      }

      function recuperarDatosFormulario() {
        let registro = {
          codigo: $('#Codigo').val(),
          titulo: $('#Titulo').val(),
          descripcion: $('#Descripcion').val(),
          inicio: $('#FechaInicio').val() + ' ' + $('#HoraInicio').val(),
          fin: $('#FechaFin').val() + ' ' + $('#HoraFin').val(),
          colorfondo: $('#ColorFondo').val(),
          colortexto: $('#ColorTexto').val()
        };
        return registro;
      }

    });
  </script>
  </body>
</html>