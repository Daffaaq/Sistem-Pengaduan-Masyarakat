describe('LandingPage', () => {
    it('landingpage1', () => {
        cy.visit('http://127.0.0.1:8000/');
        cy.get(':nth-child(6) > .nav-link').click();
        cy.wait(2000);
    });
});
