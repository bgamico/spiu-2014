<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mapa extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mapa_model');
        $this->load->library('googlemaps');
    }
    
    public function index()
    {
        //creamos la configuraci�n del mapa con un array
        $config = array();
        //la zona del mapa que queremos mostrar al cargar el mapa
        //como vemos le podemos pasar la ciudad y el pa�s
        //en lugar de la latitud y la longitud
        $config['center'] = 'madrid,espana';
        // el zoom, que lo podemos poner en auto y de esa forma
        //siempre mostrar� todos los markers ajustando el zoom    
        $config['zoom'] = '6';        
        //el tipo de mapa, en el pdf pod�is ver m�s opciones
        $config['map_type'] = 'ROADMAP';
        //el ancho del mapa        
        $config['map_width'] = '700px';    
        //el alto del mapa    
        $config['map_height'] = '600px';    
        //inicializamos la configuraci�n del mapa    
        $this->googlemaps->initialize($config);    
        
        //hacemos la consulta al modelo para pedirle 
        //la posici�n de los markers y el infowindow
        $markers = $this->mapa_model->get_markers();
        foreach($markers as $info_marker)
        {
            $marker = array();
            //podemos elegir DROP o BOUNCE
            $marker ['animation'] = 'DROP';
            //posici�n de los markers
            $marker ['position'] = $info_marker->pos_y.','.$info_marker->pos_x;
            //infowindow de los markers(ventana de informaci�n)    
            $marker ['infowindow_content'] = $info_marker->infowindow;
            //la id del marker
            $marker['id'] = $info_marker->id; 
            $this->googlemaps->add_marker($marker);
 
            //podemos colocar iconos personalizados as� de f�cil
            //$marker ['icon'] = base_url().'imagenes/'.$fila->imagen;
 
            //si queremos que se pueda arrastrar el marker
            //$marker['draggable'] = TRUE;
            //si queremos darle una id, muy �til
        }
        
        //en $data['datos'tenemos la informaci�n de cada marker para
        //poder utilizarlo en el sidebar en nuestra vista mapa_view
        $data['datos'] = $this->mapa_model->get_markers();
        //en data['map'] tenemos ya creado nuestro mapa para llamarlo en la vista
        $data['map'] = $this->googlemaps->create_map();
        $this->load->view('mapa_view',$data);
    }
}