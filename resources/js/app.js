window.toggleScrolling = modalShown => {
  if (modalShown) {
    document.body.classList.remove('overflow-hidden')
  } else {
    document.body.classList.add('overflow-hidden')
  }
}