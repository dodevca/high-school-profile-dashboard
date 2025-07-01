function showAlert(type, messages) {
	const alertContainer = document.getElementById('alert-container');
	alertContainer.innerHTML = '';
	const wrapper = document.createElement('div');
	wrapper.className = `alert alert-${type} alert-dismissible fade show`;
	wrapper.role = 'alert';

	if (Array.isArray(messages)) {
		const ul = document.createElement('ul');
		messages.forEach(msg => {
			const li = document.createElement('li');
			li.textContent = msg;
			ul.appendChild(li);
		});
		wrapper.appendChild(ul);
	} else {
		wrapper.textContent = messages;
	}

	const btn = document.createElement('button');
	btn.type = 'button';
	btn.className = 'btn-close';
	btn.setAttribute('data-bs-dismiss', 'alert');
	btn.setAttribute('aria-label', 'Close');
	wrapper.appendChild(btn);

	alertContainer.appendChild(wrapper);
}