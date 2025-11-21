import Alpine from 'alpinejs'
import drawChart from './drawChart'
import ghostForm from './ghostForm'
import sendRequest from './sendRequest'
import stripEmptyFields from './stripEmptyFields'
import upload from './upload'

window.Alpine = Alpine
window.drawChart = drawChart
window.ghostForm = ghostForm
window.sendRequest = sendRequest
window.stripEmptyFields = stripEmptyFields
window.upload = upload

Alpine.start()