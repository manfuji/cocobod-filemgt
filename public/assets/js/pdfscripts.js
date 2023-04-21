


  var myState = {
            pdf: null,
            currentPage: 1,
            zoom: 1
        }
  function callPdf(pdf_link){
  console.log(pdf_link)
  pdfjsLib.getDocument(pdf_link).then((pdf) => {
  
  myState.pdf = pdf;
            render();
  });
  }
  
  function render() {
            myState.pdf.getPage(myState.currentPage).then((page) => {
          
                var canvas = document.getElementById("pdf_renderer");
                var ctx = canvas.getContext('2d');
      
                var viewport = page.getViewport(myState.zoom);
  
                canvas.width = viewport.width;
                canvas.height = viewport.height;
          
                page.render({
                    canvasContext: ctx,
                    viewport: viewport
                });
            });
        }
  
  function previousPage(){
  if(myState.pdf == null|| myState.currentPage == 1) 
    return;
  
      myState.currentPage -= 1;
      document.getElementById("current_page").value = myState.currentPage;
      render();
  }
  
  function nextPage(){
     if(myState.pdf == null || myState.currentPage > myState.pdf._pdfInfo.numPages) 
    return;
          
    myState.currentPage += 1;
    document.getElementById("current_page").value = myState.currentPage;
    render();
  }
  
  function ofPageNumberSet(e){
  if(myState.pdf == null) return;
  
  // Get key code
  var code = (e.keyCode ? e.keyCode : e.which);
  
  // If key code matches that of the Enter key
  if(code == 13) {
      var desiredPage = document.getElementById('current_page').valueAsNumber;
                        
      if(desiredPage >= 1 && desiredPage <= myState.pdf._pdfInfo.numPages) {
          myState.currentPage = desiredPage;
          document.getElementById("current_page").value = desiredPage;
          render();
      }
  }
  }
  
  function zoomIn(){
    document.getElementById('zoom_in')
    .addEventListener('click', (e) => {
    if(myState.pdf == null) return;
    myState.zoom += 0.5;
  
    render();
  });
  }
  
  // 
  
  function zoomOut(){
    document.getElementById('zoom_out')
    .addEventListener('click', (e) => {
    if(myState.pdf == null) return;
    myState.zoom -= 0.5;
     
    render();
  });
  }
  
  