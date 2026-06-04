let draggedPiece = null;

document.addEventListener('dragstart', function(e){
    const wrapper = e.target.closest('.piece-wrapper');
    if(wrapper){
        draggedPiece = wrapper;
        setTimeout(()=>{ wrapper.style.opacity='0.3'; }, 0);
    }
});

document.addEventListener('dragend', function(e){
    const wrapper = e.target.closest('.piece-wrapper');
    if(wrapper){ wrapper.style.opacity='1'; }
    document.querySelectorAll('.square').forEach(s => s.classList.remove('drag-over'));
});

document.querySelectorAll('.square').forEach(square => {

    square.addEventListener('dragover', function(e){ e.preventDefault(); });

    square.addEventListener('dragenter', function(){ this.classList.add('drag-over'); });

    square.addEventListener('dragleave', function(){ this.classList.remove('drag-over'); });

    square.addEventListener('drop', function(e){
        e.preventDefault();
        this.classList.remove('drag-over');
        if(!draggedPiece) return;

        const existing = this.querySelector('.piece-wrapper');
        if(existing){ existing.remove(); }

        this.appendChild(draggedPiece);
        draggedPiece.style.opacity = '1';
    });
});