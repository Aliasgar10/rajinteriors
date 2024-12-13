<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PDF Flipbook</title>
  <link rel="stylesheet" href="style.css">
<style>
   body {
  font-family: Arial, sans-serif;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: #f8f8f8;
  margin: 0;
}

.book-frame {
  display: flex;
  justify-content: center;
  align-items: center;
  background: #e3d7c4;
  border: 10px solid #af9d8e;
  border-radius: 10px;
  width: 900px;
  height: 650px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.book {
  position: relative;
  width: 800px;
  height: 600px;
  perspective: 1500px;
  overflow: hidden;
}

.page-wrapper {
  position: absolute;
  width: 50%;
  height: 100%;
  backface-visibility: hidden;
  transform-origin: center right;
  transform: rotateY(0);
  transition: transform 0.8s ease-in-out;
}

.page-wrapper.right {
  transform-origin: center left;
  right: 0;
}

.page-wrapper:hover {
  cursor: pointer;
}

canvas {
  width: 100%;
  height: 100%;
}

/* Hover effects for page flipping */
.page-wrapper.left:hover {
  transform: rotateY(20deg);
}

.page-wrapper.right:hover {
  transform: rotateY(-20deg);
}

/* Flipped state */
.page-wrapper.left.flipped {
  transform: rotateY(-180deg);
}

.page-wrapper.right.flipped {
  transform: rotateY(180deg);
}

</style>
</head>
<body>
  <div class="book-frame">
    <div class="book">
      <div class="page-wrapper left" id="leftPage">
        <canvas></canvas>
      </div>
      <div class="page-wrapper right" id="rightPage">
        <canvas></canvas>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.14.305/pdf.min.js"></script>
  <script src="script.js"></script>


  <script>
    const url = 'assets/Series-B-MR-2.pdf'; // Replace with your PDF file path
    

let pdfDoc = null;
let pageNum = 1;

// Canvas elements for rendering
const leftPageWrapper = document.querySelector('#leftPage');
const rightPageWrapper = document.querySelector('#rightPage');
const leftCanvas = leftPageWrapper.querySelector('canvas');
const rightCanvas = rightPageWrapper.querySelector('canvas');
const leftCtx = leftCanvas.getContext('2d');
const rightCtx = rightCanvas.getContext('2d');
const scale = 1.5;

// Load PDF
pdfjsLib.getDocument(url).promise.then((pdf) => {
  pdfDoc = pdf;
  renderPages();
});

// Render pages
function renderPages() {
  // Left page
  if (pageNum > 1) {
    pdfDoc.getPage(pageNum - 1).then((page) => {
      const viewport = page.getViewport({ scale });
      leftCanvas.width = viewport.width;
      leftCanvas.height = viewport.height;

      const renderContext = {
        canvasContext: leftCtx,
        viewport: viewport,
      };
      page.render(renderContext);
    });
  } else {
    leftCtx.clearRect(0, 0, leftCanvas.width, leftCanvas.height); // Clear if no previous page
  }

  // Right page
  if (pageNum <= pdfDoc.numPages) {
    pdfDoc.getPage(pageNum).then((page) => {
      const viewport = page.getViewport({ scale });
      rightCanvas.width = viewport.width;
      rightCanvas.height = viewport.height;

      const renderContext = {
        canvasContext: rightCtx,
        viewport: viewport,
      };
      page.render(renderContext);
    });
  } else {
    rightCtx.clearRect(0, 0, rightCanvas.width, rightCanvas.height); // Clear if no next page
  }
}

// Page flip handling
leftPageWrapper.addEventListener('click', () => {
  if (pageNum > 1) {
    leftPageWrapper.classList.toggle('flipped');
    pageNum -= 2; // Move back two pages
    renderPages();
  }
});

rightPageWrapper.addEventListener('click', () => {
  if (pageNum + 1 <= pdfDoc.numPages) {
    rightPageWrapper.classList.toggle('flipped');
    pageNum += 2; // Move forward two pages
    renderPages();
  }
});
  </script>
</body>
</html>

