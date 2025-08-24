// Malik Motors JavaScript - Manual Fix
document.addEventListener('DOMContentLoaded', function() {
    // Close registration modal and open login modal
    const loginModalTrigger = document.querySelector('[data-bs-target="#loginModal"]');
    const registerModalTrigger = document.querySelector('[data-bs-target="#registrationModal"]');
    
    if (loginModalTrigger) {
        loginModalTrigger.addEventListener('click', function() {
            const registrationModal = bootstrap.Modal.getInstance(document.getElementById('registrationModal'));
            if (registrationModal) {
                registrationModal.hide();
            }
        });
    }
    
    if (registerModalTrigger) {
        registerModalTrigger.addEventListener('click', function() {
            const loginModal = bootstrap.Modal.getInstance(document.getElementById('loginModal'));
            if (loginModal) {
                loginModal.hide();
            }
        });
    }

    // Subscription form handling
    const subscriptionForm = document.getElementById('subscriptionForm');
    if (subscriptionForm) {
        subscriptionForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = new FormData(subscriptionForm);
            const submitButton = subscriptionForm.querySelector('.subscribe-button');
            const originalText = submitButton.textContent;
            
            // Show loading state
            submitButton.textContent = 'Subscribing...';
            submitButton.disabled = true;
            
            try {
                const response = await fetch('/subscribe', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        email: formData.get('email')
                    })
                });
                
                const data = await response.json();
                
                if (data.success) {
                    // Transform the subscription bar to success state
                    const subscriptionContainer = document.querySelector('.subscription-container');
                    const subscribeBar = document.querySelector('.subscribe-bar');
                    
                    // Create success message
                    subscriptionContainer.innerHTML = `
                        <div class="subscription-success">
                            <h3>Thanks for Subscribing!</h3>
                            <p>You'll receive our latest deals and updates.</p>
                        </div>
                    `;
                    
                    // Change the subscribe bar background to red with smooth transition
                    subscribeBar.style.backgroundColor = '#e63946';
                    subscribeBar.style.background = 'linear-gradient(90deg, #e63946 0%, #c1121f 100%)';
                    subscribeBar.style.color = 'white';
                    subscribeBar.style.transition = 'all 0.5s ease';
                    
                    // Add visual feedback animation
                    subscribeBar.style.transform = 'scale(1.02)';
                    setTimeout(() => {
                        subscribeBar.style.transform = 'scale(1)';
                    }, 500);
                } else {
                    // Show error message
                    alert(data.message || 'Subscription failed. Please try again.');
                    submitButton.textContent = originalText;
                    submitButton.disabled = false;
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
                submitButton.textContent = originalText;
                    submitButton.disabled = false;
            }
        });
    }
});
