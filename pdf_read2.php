<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Flipbook</title>
    <link rel="stylesheet" href="styles.css">
    <style>
    body {
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f0f0f0;
}

#flipbook-container {
    width: 80%;
    height: 90%;
    perspective: 1500px;
    overflow: hidden;
}

#flipbook {
    display: flex;
    flex-direction: row;
    transform-style: preserve-3d;
    transition: transform 0.5s;
    position: relative;
}

.page {
    width: 50%;
    height: 100%;
    position: absolute;
    transform-origin: right center;
    transform: rotateY(0deg);
    background: white;
    border: 1px solid #ccc;
    overflow: hidden;
    backface-visibility: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.page img, .page canvas {
    width: 100%;
    height: 100%;
}

.page.flipped {
    transform: rotateY(-180deg);
}

#controls {
    margin-top: 20px;
    text-align: center;
}
button {
    padding: 10px 20px;
    margin: 5px;
    cursor: pointer;
}
</style>
</head>
<body>
    <div id="flipbook-container">
        <div id="flipbook">
            <!-- Pages will be dynamically added here -->
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
    <script src="script.js"></script>
</body>
</html>

<script>
const flipbook = document.getElementById("flipbook");
let currentPage = 0;

const url = "assets/Series-B-MR-2.pdf"; // Replace with your PDF URL
const pdfjsLib = window["pdfjs-dist/build/pdf"];
pdfjsLib.GlobalWorkerOptions.workerSrc = "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js";

// Fetch the PDF
async function fetchPDF() {
    const pdf = await pdfjsLib.getDocument(url).promise;
    renderPDFPages(pdf);
}

// Render PDF Pages into the Flipbook
async function renderPDFPages(pdf) {
    const totalPages = pdf.numPages;

    for (let i = 1; i <= totalPages; i++) {
        const page = await pdf.getPage(i);
        const viewport = page.getViewport({ scale: 1 });
        const canvas = document.createElement("canvas");
        const context = canvas.getContext("2d");

        canvas.height = viewport.height;
        canvas.width = viewport.width;

        // Render the page into the canvas
        await page.render({
            canvasContext: context,
            viewport: viewport,
        }).promise;

        // Create flipbook pages
        const pageDiv = document.createElement("div");
        pageDiv.classList.add("page");
        pageDiv.appendChild(canvas);

        // Add click event to flip pages
        pageDiv.addEventListener("click", () => {
            pageDiv.classList.toggle("flipped");
            currentPage = i;
        });

        flipbook.appendChild(pageDiv);
    }
}

// Initialize the PDF Flipbook
fetchPDF();
</script>