// Lightbox functionality for image galleries
let currentImageIndex = 0;
let galleryImages = [];

function openLB(imageUrl) {
    const lightbox = document.getElementById('lightbox');
    const lbContent = document.getElementById('lbContent');
    
    if (!lightbox || !lbContent) return;

    // Find all images in the current gallery
    const currentGallery = document.querySelector('.grid img[onclick*="openLB"]');
    if (currentGallery) {
        const allImages = Array.from(currentGallery.parentElement.querySelectorAll('img[onclick*="openLB"]'));
        galleryImages = allImages.map(img => img.src);
        currentImageIndex = galleryImages.indexOf(imageUrl);
    } else {
        galleryImages = [imageUrl];
        currentImageIndex = 0;
    }

    lbContent.innerHTML = `<img src="${imageUrl}" alt="Gallery image" class="max-h-full max-w-full object-contain mx-auto">`;
    lightbox.classList.remove('hidden');
    lightbox.classList.add('flex');
    document.body.style.overflow = 'hidden';
}

function closeLB() {
    const lightbox = document.getElementById('lightbox');
    if (lightbox) {
        lightbox.classList.add('hidden');
        lightbox.classList.remove('flex');
        document.body.style.overflow = '';
    }
}

function stepLB(direction) {
    currentImageIndex += direction;
    
    if (currentImageIndex < 0) {
        currentImageIndex = galleryImages.length - 1;
    } else if (currentImageIndex >= galleryImages.length) {
        currentImageIndex = 0;
    }

    const lbContent = document.getElementById('lbContent');
    if (lbContent && galleryImages[currentImageIndex]) {
        lbContent.innerHTML = `<img src="${galleryImages[currentImageIndex]}" alt="Gallery image" class="max-h-full max-w-full object-contain mx-auto">`;
    }
}

// Close lightbox on escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeLB();
    }
});

// Close lightbox on background click
document.addEventListener('click', function(e) {
    const lightbox = document.getElementById('lightbox');
    if (lightbox && e.target === lightbox) {
        closeLB();
    }
});
