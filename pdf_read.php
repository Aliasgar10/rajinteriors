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
  flex-direction: column;
  align-items: center;
  background: #e3d7c4;
  border: 10px solid #af9d8e;
  border-radius: 10px;
  width: 900px;
  height: 750px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
  overflow: hidden;
}

.book {
  position: relative;
  width: 800px;
  height: 600px;
  perspective: 1500px;
  margin-top: 20px;
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

/* Controls */
.controls {
  display: flex;
  justify-content: space-between;
  margin-top: 20px;
  width: 200px;
}

button {
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  background-color: #007BFF;
  color: white;
  font-size: 16px;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
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
    <div class="controls">
      <button id="prevPage">Previous</button>
      <button id="nextPage">Next</button>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.14.305/pdf.min.js"></script>
  <script src="script.js"></script>


  <script>
    const url = 'assets/Series-B-MR-2.pdf'; // Replace with your PDF file path
    
let pdfDoc = null;
let currentPage = 1; // Track the current page number
let totalPages = 0;

// Canvas elements for rendering
const leftPageWrapper = document.querySelector('#leftPage');
const rightPageWrapper = document.querySelector('#rightPage');
const leftCanvas = leftPageWrapper.querySelector('canvas');
const rightCanvas = rightPageWrapper.querySelector('canvas');
const leftCtx = leftCanvas.getContext('2d');
const rightCtx = rightCanvas.getContext('2d');
const scale = 1.5;

// Buttons for navigation
const prevButton = document.getElementById('prevPage');
const nextButton = document.getElementById('nextPage');

// Load PDF
pdfjsLib.getDocument(url).promise.then((pdf) => {
  pdfDoc = pdf;
  totalPages = pdf.numPages; // Get total pages in the PDF
  renderPages();
});

// Render pages
function renderPages() {
  // Left page (previous page)
  if (currentPage > 1) {
    pdfDoc.getPage(currentPage - 1).then((page) => {
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

  // Right page (current page)
  if (currentPage <= totalPages) {
    pdfDoc.getPage(currentPage).then((page) => {
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

// Next page functionality
nextButton.addEventListener('click', () => {
  if (currentPage + 1 <= totalPages) {
    currentPage += 2; // Move forward by two pages
    renderPages();
  }
});

// Previous page functionality
prevButton.addEventListener('click', () => {
  if (currentPage > 1) {
    currentPage -= 2; // Move back by two pages
    renderPages();
  }
});

// Flipping animations
leftPageWrapper.addEventListener('click', () => {
  if (currentPage > 1) {
    leftPageWrapper.classList.toggle('flipped');
  }
});

rightPageWrapper.addEventListener('click', () => {
  if (currentPage <= totalPages) {
    rightPageWrapper.classList.toggle('flipped');
  }
});

  </script>
</body>
</html>

