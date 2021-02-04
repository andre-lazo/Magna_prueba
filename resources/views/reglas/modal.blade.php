
<style>

    body{
      padding-top: 100px;
    }
        .modal2{
          
            position: absolute;
            top: 5%;
        
            left:25%;   
        }
        .cal{
          margin-right: 500px;
          margin-left: 60px;
        }
        @media (max-width: 700px){
          .cal{
            width: 100%;
            margin-left: 0px;
            margin-right: 30px;
          }
        
        }
        .my-custom-scrollbar {
          position: relative;
          height: 40%;
          overflow: auto;
          }
          .table-wrapper-scroll-y {
          display: block;
          }
    </style>
<div class="modal2 modal fade   "  id="norm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  >
    <div class="modal-dialog  modal-xl " >
    <div class="modal-body ">
    
  
                  <div class="row flex-wrap">
              
          <div class="col-xs-12 col-lg-5 flex-wrap" style="background-color:#FE1713; border-radius: 6%;">
      <center>	<h2  class="mt-2" style=" font-family: Verdana; font-weight:550;color:white;"> NORMAS SANITARIAS <h2> </center>
      <center>  <h5 style=" font-family: Verdana; color:#FEC504;">COVID - 19  </h5> </center>
      <div class=" ml-2 mr-2 mb-4 Flex-wrap" style="background-color:white;  border-radius: 6%;">
          
  
      
      <div class="row  container " >
                <div class="col-xs-12 col-lg-3 mt-4 mb-2 ml-4 mr-4 Flex-wrap ">
                  <img src="{{asset('img/mascarilla.jpeg')}}"width="100px" height="100px" style="border-radius: 50%;" >
              <center>	<div class="section mt-2  "   style="background-color: #3734AE  ; color:white; font-size:8pt; width:100px; height:33px "> USO OBLIGATORIO DE MASCARILLA</div> </center>
                </div>
                
                <div class="col-xs-12 col-lg-3 mt-4 mb-2 mr-4 Flex-wrap">
                  <img src="{{asset('img/distancia.jpeg')}}"width="100px" height="100px" style="border-radius: 50%;">
                  <center>	<div class="section mt-2  "  style="background-color:#3734AE; color:white; font-size:8pt; width:100px; height:33px  "> RESPETE LA DISTANCIA DE 2 METROS</div> </center>
                </div>
                
                <div class="col-xs-12 col-lg-3 mt-4 mb-2 flex-wrap">
                  <img src="{{asset('img/gel.jpeg')}}"width="100px" height="100px" style="border-radius: 50%;" > 
                  <center>	<div class="section mt-2  "  style="background-color:#3734AE; color:white; font-size:8pt; width:100px; height:33px   "> UTILICE ALCOHOL  ANTIBACTERIAL </div> </center>
                </div>
                </div>
  
  
  
                <div class="row mt-5 container "  >
                <div class="col-xs-1 col-lg-3  mb-2 ml-4 mr-4 Flex-wrap ">
                
                <img src="{{asset('img/mano.jpeg')}}"width="100px" height="100px" style="border-radius: 50%;" >
                <center>	<div class="section mt-2  "  style="background-color:#FE1713 ; color:white; font-size:8pt; width:100px; height:33px   "> EVITE EL CONTACTO FÍSICO </div> </center>
              
                
               </div>
              <div class="col-xs-1 col-lg-3  mb-2 mr-4 flex-wrap ">
                  <img src="{{asset('img/cara.jpeg')}}" width="100px" height="100px" style="border-radius: 50%;">
                  <center>	<div class="section mt-2  "  style="background-color: #FE1713 ; color:white; font-size:8pt; width:100px; height:33px   "> EVITE TOCARSE LA CARA </div> </center>
                
               
                </div>
              
                <div class="col-xs-1 col-lg-3 flex-wrap " >
                
                <img src="{{asset('img/escupir.jpeg')}}"width="100px" height="100px" style="border-radius: 50%;" >
                <center>	<div class="section mt-2  "  style="background-color: #FE1713 ; color:white; font-size:8pt; width:100px; height:33px   "> PROHIBIDO ESCUPIR </div> </center>
               
              
              </div>
              </div>
              <div class="row  container " >
              <div class="col-xs-1 col-lg-2 mt-2 mb-2 ml-5 mr-3 Flex-wrap ">
                 
                </div>
                
                <div class="col-xs-1 col-lg-2 mt-3 mb-3 mr-2 Flex-wrap">
                  <img src="{{asset('img/magna.jpeg')}}" width="75px" height="60px" >
    </div>
                
                <div class="col-xs-1 col-lg-2 mt-4 mb-2  flex-wrap">
                <img src="{{asset('img/covid-19.png')}}" width="75px" height="45px" >
                
                </div>
  
              </div>
              </div>
              
  
  
                  </div>
                  </div>
                  </div>
                  </div>
          </div>
          
  
  
          <script type="text/javascript">
            $(function(){
              if (screen.width > 800) {
              $("#norm").modal();}
            else{
              $('#norm').modal('hide');
            } 
              
             });
        </script>
  
  
  
  
  