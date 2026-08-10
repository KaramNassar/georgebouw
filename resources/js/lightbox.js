let currentImageIndex = 0;
let galleryImages = [];

function resolveImageUrl(imageUrl) {
    return new URL(imageUrl, window.location.href).href;
}

function renderLightboxImage(imageUrl) {
    const lbContent = document.getElementById('lbContent');

    if (!lbContent) {
        return;
    }

    const image = document.createElement('img');
    image.src = imageUrl;
    image.alt = 'Gallery image';
    image.className = 'max-h-full max-w-full object-contain mx-auto';

    lbContent.replaceChildren(image);
}

function openLB(imageUrl) {
    const lightbox = document.getElementById('lightbox');

    if (!lightbox) {
        return;
    }

    const resolvedImageUrl = resolveImageUrl(imageUrl);

    // Find all images in the current gallery
    const currentGallery = document.querySelector('.grid img[onclick*="openLB"]');
    if (currentGallery) {
        const allImages = Array.from(currentGallery.parentElement.querySelectorAll('img[onclick*="openLB"]'));
        galleryImages = allImages.map(img => img.currentSrc || img.src);
        currentImageIndex = galleryImages.indexOf(resolvedImageUrl);
    } else {
        galleryImages = [resolvedImageUrl];
        currentImageIndex = 0;
    }

    if (currentImageIndex === -1) {
        currentImageIndex = 0;
    }

    renderLightboxImage(resolvedImageUrl);
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

    if (galleryImages[currentImageIndex]) {
        renderLightboxImage(galleryImages[currentImageIndex]);
    }
}

window.openLB = openLB;
window.closeLB = closeLB;
window.stepLB = stepLB;

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
