// Initialize Lucide icons
if (typeof lucide !== 'undefined') {
    lucide.createIcons();
}

// Mobile menu toggle
function toggleMenu() {
    const menu = document.getElementById('mobileMenu');
    if (menu) {
        menu.classList.toggle('hidden');
    }
}

// Scroll reveal animation
function revealOnScroll() {
    const reveals = document.querySelectorAll('.reveal');
    reveals.forEach(reveal => {
        const windowHeight = window.innerHeight;
        const revealTop = reveal.getBoundingClientRect().top;
        const revealPoint = 150;

        if (revealTop < windowHeight - revealPoint) {
            reveal.classList.add('in');
        }
    });
}

window.addEventListener('scroll', revealOnScroll);
window.addEventListener('load', revealOnScroll);

// Before/After slider
function setBA(value) {
    const baAfter = document.getElementById('baAfter');
    const baHandle = document.getElementById('baHandle');
    if (baAfter && baHandle) {
        baAfter.style.width = value + '%';
        baHandle.style.left = value + '%';
    }
}

// Wizard navigation
let currentStep = 1;
const totalSteps = 4;

function wizNav(direction) {
    const panels = document.querySelectorAll('.wizard-panel');
    const backBtn = document.getElementById('wizBack');
    const nextBtn = document.getElementById('wizNext');

    panels.forEach(panel => panel.classList.add('hidden'));

    currentStep += direction;

    if (currentStep < 1) currentStep = 1;
    if (currentStep > totalSteps) currentStep = totalSteps;

    const currentPanel = document.querySelector(`[data-step="${currentStep}"]`);
    if (currentPanel) {
        currentPanel.classList.remove('hidden');
    }

    backBtn.disabled = currentStep === 1;
    nextBtn.textContent = currentStep === totalSteps ? 'Afronden' : 'Volgende';

    updateWizardSteps();
}

function updateWizardSteps() {
    const stepsContainer = document.getElementById('wizardSteps');
    if (!stepsContainer) return;

    stepsContainer.innerHTML = '';
    for (let i = 1; i <= totalSteps; i++) {
        const dot = document.createElement('div');
        dot.className = `wizard-dot h-2 flex-1 rounded-full ${i <= currentStep ? 'bg-crimson' : 'bg-white/10'}`;
        stepsContainer.appendChild(dot);
    }
}

// Size range update
function updateSize(value) {
    const sizeVal = document.getElementById('sizeVal');
    if (sizeVal) {
        sizeVal.textContent = value + ' m²';
    }
}

// Contact form submission
function contactSubmit(event) {
    event.preventDefault();
    const name = document.getElementById('cName').value;
    const phone = document.getElementById('cPhone').value;
    const service = document.getElementById('cService').value;
    const message = document.getElementById('cMsg').value;

    const whatsappText = encodeURIComponent(
        `Nieuwe aanvraag:\n\nNaam: ${name}\nTelefoon: ${phone}\nDienst: ${service}\nBericht: ${message}`
    );

    window.open(`https://wa.me/31684954212?text=${whatsappText}`, '_blank');
}

// Portfolio filtering
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const projectCards = document.querySelectorAll('[data-category]');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const filter = this.dataset.filter;

            filterBtns.forEach(b => {
                b.classList.remove('bg-crimson', 'text-white');
                b.classList.add('text-neutral');
            });
            this.classList.add('bg-crimson', 'text-white');
            this.classList.remove('text-neutral');

            projectCards.forEach(card => {
                if (filter === 'all' || card.dataset.category === filter) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // Initialize wizard
    updateWizardSteps();
});
