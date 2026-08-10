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

// Make toggleMenu available globally
window.toggleMenu = toggleMenu;

// Close menu when clicking outside
document.addEventListener('click', function(event) {
    const menu = document.getElementById('mobileMenu');
    const menuButton = document.querySelector('button[aria-label="Menu"]');
    
    if (menu && !menu.classList.contains('hidden')) {
        if (!menu.contains(event.target) && !menuButton.contains(event.target)) {
            menu.classList.add('hidden');
        }
    }
});

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

// Make setBA globally available
window.setBA = setBA;

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

// Make wizard functions globally available
window.wizNav = wizNav;

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

// Make updateSize globally available
window.updateSize = updateSize;

function metaContent(name) {
    return document.querySelector(`meta[name="${name}"]`)?.content || '';
}

async function postLead(url, body) {
    const response = await fetch(url, {
        method: 'POST',
        headers: {
            Accept: 'application/json',
            'X-CSRF-TOKEN': metaContent('csrf-token'),
        },
        body,
    });

    if (!response.ok) {
        throw new Error(`Lead storage failed with status ${response.status}`);
    }

    return response.json();
}

async function postJsonLead(url, payload) {
    const response = await fetch(url, {
        method: 'POST',
        headers: {
            Accept: 'application/json',
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': metaContent('csrf-token'),
        },
        body: JSON.stringify(payload),
    });

    if (!response.ok) {
        throw new Error(`Lead storage failed with status ${response.status}`);
    }

    return response.json();
}

// Contact form submission
async function contactSubmit(event) {
    event.preventDefault();
    const form = event.target;
    const name = document.getElementById('cName').value;
    const phone = document.getElementById('cPhone').value;
    const serviceSelect = document.getElementById('cService');
    const service = serviceSelect.value;
    const message = document.getElementById('cMsg').value;
    const contactStatus = document.getElementById('contactStatus');

    try {
        await postJsonLead(metaContent('contact-message-store-url'), {
            name,
            phone,
            service,
            message,
        });

        form.reset();
        contactStatus?.classList.remove('hidden');
    } catch (error) {
        console.error(error);
    }
}

// Make contactSubmit globally available
window.contactSubmit = contactSubmit;

// Wizard submission functions
function submitWhatsApp() {
    const name = document.getElementById('leadName').value;
    const selectedServices = [];
    document.querySelectorAll('input[data-service]:checked').forEach(cb => {
        selectedServices.push(cb.value);
    });
    
    const propertyType = document.querySelector('input[name="propertyType"]:checked')?.value || '';
    const size = document.getElementById('sizeRange')?.value || '';
    const urgency = document.querySelector('input[name="urgency"]:checked')?.value || '';
    const material = document.querySelector('input[name="material"]:checked')?.value || '';
    const budget = document.querySelector('input[name="budget"]:checked')?.value || '';
    
    const text = encodeURIComponent(
        `Projectaanvraag:\n\nDiensten: ${selectedServices.join(', ')}\nType woning: ${propertyType}\nOppervlakte: ${size} m²\nPlanning: ${urgency}\nMateriaal: ${material}\nBudget: ${budget}\nNaam: ${name}`
    );
    
    window.open(`https://wa.me/31684954212?text=${text}`, '_blank');
}

function submitEmail() {
    const name = document.getElementById('leadName').value;
    const selectedServices = [];
    document.querySelectorAll('input[data-service]:checked').forEach(cb => {
        selectedServices.push(cb.value);
    });
    
    const propertyType = document.querySelector('input[name="propertyType"]:checked')?.value || '';
    const size = document.getElementById('sizeRange')?.value || '';
    const urgency = document.querySelector('input[name="urgency"]:checked')?.value || '';
    const material = document.querySelector('input[name="material"]:checked')?.value || '';
    const budget = document.querySelector('input[name="budget"]:checked')?.value || '';
    
    const subject = encodeURIComponent('Projectaanvraag - GEORGE BOUW');
    const body = encodeURIComponent(
        `Naam: ${name}\n\nDiensten: ${selectedServices.join(', ')}\nType woning: ${propertyType}\nOppervlakte: ${size} m²\nPlanning: ${urgency}\nMateriaal: ${material}\nBudget: ${budget}`
    );
    
    window.location.href = `mailto:info@georgebouw.nl?subject=${subject}&body=${body}`;
}

function selectedRadioValue(name) {
    return document.querySelector(`input[name="${name}"]:checked`)?.value || '';
}

function mappedWizardValue(type, value) {
    const maps = {
        urgency: {
            flexible: 'flexible',
            '1-3months': 'soon',
            asap: 'urgent',
        },
        material: {
            basic: 'standard',
            standard: 'premium',
            premium: 'luxury',
        },
        budget: {
            economy: 'a',
            mid: 'b',
            high: 'c',
        },
    };

    return maps[type][value] || '';
}

function quoteSummary() {
    const name = document.getElementById('leadName').value;
    const selectedServices = [];
    document.querySelectorAll('input[data-service]:checked').forEach(cb => {
        selectedServices.push(cb.value);
    });

    return {
        name,
        selectedServices,
        propertyType: selectedRadioValue('propertyType'),
        size: document.getElementById('sizeRange')?.value || '',
        urgency: selectedRadioValue('urgency'),
        material: selectedRadioValue('material'),
        budget: selectedRadioValue('budget'),
    };
}

function collectQuoteRequestFormData() {
    const summary = quoteSummary();

    if (summary.selectedServices.length === 0) {
        return null;
    }

    const formData = new FormData();
    formData.append('name', summary.name);
    summary.selectedServices.forEach(service => formData.append('scope[]', service));
    formData.append('property_type', summary.propertyType);
    formData.append('size_m2', summary.size);
    formData.append('urgency', mappedWizardValue('urgency', summary.urgency));
    formData.append('material', mappedWizardValue('material', summary.material));
    formData.append('budget_bracket', mappedWizardValue('budget', summary.budget));
    formData.append('locale', document.documentElement.lang || 'nl');

    Array.from(document.getElementById('quotePhotos')?.files || []).forEach(photo => {
        formData.append('photos[]', photo);
    });

    return formData;
}

async function storeQuoteRequest() {
    const formData = collectQuoteRequestFormData();

    if (!formData) {
        alert('Kies minimaal een dienst voordat u de aanvraag verstuurt.');
        return false;
    }

    try {
        await postLead(metaContent('quote-request-store-url'), formData);
    } catch (error) {
        console.error(error);
    }

    return true;
}

submitWhatsApp = async function () {
    const {
        name,
        selectedServices,
        propertyType,
        size,
        urgency,
        material,
        budget,
    } = quoteSummary();
    const whatsappWindow = window.open('', '_blank');
    const stored = await storeQuoteRequest();

    if (!stored) {
        whatsappWindow?.close();
        return;
    }

    const text = encodeURIComponent(
        `Projectaanvraag:\n\nDiensten: ${selectedServices.join(', ')}\nType woning: ${propertyType}\nOppervlakte: ${size} mÂ²\nPlanning: ${urgency}\nMateriaal: ${material}\nBudget: ${budget}\nNaam: ${name}`
    );

    if (whatsappWindow) {
        whatsappWindow.location.href = `https://wa.me/31684954212?text=${text}`;
    } else {
        window.location.href = `https://wa.me/31684954212?text=${text}`;
    }
};

submitEmail = async function () {
    const {
        name,
        selectedServices,
        propertyType,
        size,
        urgency,
        material,
        budget,
    } = quoteSummary();
    const stored = await storeQuoteRequest();

    if (!stored) {
        return;
    }

    const subject = encodeURIComponent('Projectaanvraag - GEORGE BOUW');
    const body = encodeURIComponent(
        `Naam: ${name}\n\nDiensten: ${selectedServices.join(', ')}\nType woning: ${propertyType}\nOppervlakte: ${size} mÂ²\nPlanning: ${urgency}\nMateriaal: ${material}\nBudget: ${budget}`
    );

    window.location.href = `mailto:info@georgebouw.nl?subject=${subject}&body=${body}`;
};

function onUpload(input) {
    const label = document.getElementById('uploadLabel');
    if (input.files.length > 0) {
        label.textContent = `${input.files.length} foto(s) geselecteerd`;
    }
}

// Make wizard submission functions globally available
window.submitWhatsApp = submitWhatsApp;
window.submitEmail = submitEmail;
window.onUpload = onUpload;

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
