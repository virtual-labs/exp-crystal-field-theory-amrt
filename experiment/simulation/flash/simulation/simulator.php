<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<div class="post" align="left">&nbsp; <!--leave this space as such.. som wired issue-->
<?php include('breadcum.php'); ?>

  <blockquote> 
    <span class="title">Crystal Field Theory</span>
    
	<p>    <div class="postConentPadding">
	  <?php
		//@include('vlab/'.$sub.'/'.$brch.'/'.$sim.'/menu.php');
		@include('menu.php');

?>
</p>
<p align="center"><iframe src="<?php echo 'vlab/'.$sub.'/'.$brch.'/'.$sim.'/'.'simulation.html'?>" frameborder="0" height="600" width="800" scrolling="no"></iframe></p>
  
<p class="content" >
<a href="javascript:shwgrd();"> Show/Hide worksheet</a>
</p>
<br />

<meta http-equiv="Content-Language" content="en-us" /> 
<meta name="keywords" content="dhtml grid, AJAX grid, living chart, flash chart" >
<meta name="description" content="How to add chart functionalities to grid" >
<script src="Scripts/grid/jssc3.js" type="text/javascript"></script>
<link href="Scripts/grid/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" media="all" href="Scripts/grid/calendar/calendar-blue.css"  />
<script type="text/javascript" src="Scripts/grid/calendar/calendar.js"></script>
<script type="text/javascript" src="Scripts/grid/calendar/calendar-cn-utf8.js"></script>
<script type="text/javascript" src="Scripts/grid/calendar/calendar-setup.js"></script>
<link rel="stylesheet" type="text/css" href="Scripts/grid/skin/vista/skinstyle.css" />
<script type="text/javascript" src="Scripts/grid/flashchart/fusioncharts/FusionCharts.js"></script>

<link rel="stylesheet" type="text/css" href="Scripts/grid/gt_grid.css" />  
<script type="text/javascript" src="Scripts/grid/gt_msg_en.js"></script>
<script type="text/javascript" src="Scripts/grid/gt_const.js"></script>
<script type="text/javascript" src="Scripts/grid/gt_grid_all.js"></script>
<script type="text/javascript" >  
 var cfsc;

var cfsc1 ;
  var data1 = [
[1,0,0,0,0]
];

var dsOption= {

    fields :[
 

        {name : 'Octahedral',type : 'float' },

        {name : 'Tetrahedral' ,type : 'float',  initValue : function(record){
			 
           if(record[0]==0){
			   var octa=1;
               return octa;
		   }
		   else if(record[0]==1){
			   var tetra=0;
               return tetra;
		   }
        } },
		
		{name : 'nt2g' ,type: 'float' },

        {name : 'neg',type : 'float'},
       
	     {name : 'CFSE' ,type: 'float',  initValue : function(record){
			    if(record[0]==0){
				 
                 cfsc=Number(Number(0.4*record[2]).toFixed(2))-Number(Number(0.6*record[3]).toFixed(2)).toFixed(2);
				// alert(cfsc);
                 cfsc =(( parseInt(cfsc*100)/100)+" &Delta;t");
			 // cfsc=&Delta;
			
                return cfsc;
				}
				 else if(record[0]==1){
					  cfsc1=Number(Number(0.6*record[3]).toFixed(2))-Number(Number(0.4*record[2]).toFixed(2)).toFixed(2);
					//  cfsc1  =((0.6*record[3])-(0.4*record[2]));
					// alert(cfsc1);
                cfsc1 =(( parseInt(cfsc1*100)/100)+" &Delta;o");
				 	 // cfsc1=&amp;	
					
                    return cfsc1; 
				 }
				
        } }
		 
		 
    ],

    recordType : 'array',
 
data: data1
	
} 



var colsOption = [

   
     {id: 'Octahedral' , header: "Octahedral" , width :159 ,editor: {  type :"text"  }},

     {id: 'Tetrahedral' , header: "Tetrahedral" , width :159 },
	 
	  {id: 'nt2g' , header: "nt2g" , width :159 ,editor: {  type :"text"  }  },

     {id: 'neg' , header: "neg" , width :159,editor: {  type :"text"  } },
	 
	   {id: 'CFSE' , header: "CFSE" , width :159  }   
	
		 
];

 

var chartNum=0;
function loadSwf(id){
	chartNum=2;
	mygrid.showDialog('chart')
}
function loadSwf2(id){
	chartNum=3;
	mygrid.showDialog('chart')
}

var gridOption={
    id : "grid1",
	width: "800",  
	height: "200",  	
    container : 'grid1_container', 
	// loadURL : 'Scripts/grid/export_php/testList.php',
    SigmaGridPath : 'Scripts/grid/',
	exportURL : 'Scripts/grid/export_php/testList.php?export=true',
	exportFileName : 'test_export_doc',
	 //defaultRecord : [3,6,7,6],

	dataset : dsOption ,
	columns : colsOption ,
	customHead : 'myHead1',
	toolbarPosition : 'bottom',
	toolbarContent : ' reload  save | print xls pdf |  '
	
	//toolbarContent : 'pdf' 
};
//function masterCompleted(grid){
    //var colObj=grid1.columnMap['Mean'];
	  //colObj.group();
//}

//showGrid();
var showTable=false;
function shwgrd(){
	if(showTable){
		showTable=false;
		show()
	}else{
		showTable=true;
		hide()
	}
}

function showGrid(){

	 if (Sigma.$('grid1_container').style.display!="none") {
	  Sigma.$('grid1_container').style.display="none";
		//grid1_container.visibility=hidden;
    }else{
	 Sigma.$('grid1_container').style.display='';
	    mygrid.onShow();
	   
		
	   }
}
//setChart type : Line, Area2D, Bar2D, Candlestick, Column2D, Column3D, Doughnut2D, Funnel, Gantt, MSArea2D, MSBar2D, MSColumn2D, MSColumn2DLineDY, MSColumn3D, MSColumn3DLineDY, MSLine, Pie2D, Pie3D,StackedArea2D, StackedBar2D,StackedColumn2D, StackedColumn3D
//setChart("Line");
setChart("FCF_Line.swf");
//setChart("FCF_MSLine.swf");
var mygrid=new Sigma.Grid(gridOption);
//Sigma.$('grid1_container').style.display="none";
Sigma.Util.onLoad( Sigma.Grid.render(mygrid) );
mygrid.visibility = 'hidden'; 
//grid1_container.visibility=hidden;
//document.all.grid1_container.style.visibility = 'hidden'; 
////////////////////

///////////
var browserType;
if (document.layers) {browserType = "nn4"}
if (document.all) {browserType = "ie"}
if (window.navigator.userAgent.toLowerCase().match("gecko")) {
   browserType= "gecko"
}

function hide() {
  if (browserType == "gecko" )
     document.poppedLayer =  eval('document.getElementById("Worksheet")');
  else if (browserType == "ie")
     document.poppedLayer =  eval('document.getElementById("Worksheet")');
  else
     document.poppedLayer =  eval('document.layers["Worksheet"]');
  //document.poppedLayer.style.visibility = "hidden";
   document.poppedLayer.style.display="none";
}
/////
function show() {
  if (browserType == "gecko" )
     document.poppedLayer = eval('document.getElementById("Worksheet")');
  else if (browserType == "ie")
     document.poppedLayer = eval('document.getElementById("Worksheet")');
  else
  document.poppedLayer = eval('document.layers["Worksheet"]');
  //document.poppedLayer.style.visibility = "visible";
   document.poppedLayer.style.display="inline";
} 
//////////////////////////////////////////////////////////

 

function SetNewXMLData()
{
 
	 
	// alert(strXML);
	if(chartNum==0)
	{
		
		return ;
		
	}
	else if(chartNum==2)
	{
		return strXML2;	
	}
	else 
	{
		return strXML;
	}
}
 
</script> 
<style type="text/css">
 .mybutton-cls { 
		background : url(Scripts/grid/skin/default/images/tool_chart.gif) no-repeat center center; 
}
 
</style>
</head>
<body> 
<div align="left" id="Worksheet"  style="visibility: visible"> 
<table id="myHead1" style="display:none">
     
    <tr >
         
      <td rowspan="2" columnId='Octahedral'>Octahedral</td>
         <td rowspan="2" columnId='Tetrahedral'>Tetrahedral</td>
         <td rowspan="2" columnId='nt2g'>n<sub>(t2g)</sub></td>
         <td rowspan="2" columnId='neg'>n<sub>(eg)</sub></td>
         <td rowspan="2" columnId='CFSE'>CFSE</td>
    </tr>
</table>

<div align="center">
 <div id="grid1_container" style="width:800px;height:300px">  

</div>  
</div>
 </div>
</div>
</body>
</html>
</blockquote>&nbsp;
</div>
