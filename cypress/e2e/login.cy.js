describe('LandingPage', () => {
    it('landingpage1', () => {
        cy.visit('http://127.0.0.1:8000/');
        cy.get(':nth-child(6) > .nav-link').click();
        cy.wait(2000);
        cy.get('.card2 > :nth-child(1) > .mb-0').should('have.text', 'Sign in');
        cy.get('#email').type('superadmin@gmail.com')
        cy.get('#password-input').type('password')
        cy.get('.mb-3 > .btn').click()
        cy.wait(2000);
        cy.wait(2000);
        cy.get('.d-block').should('have.text', 'Super Admin');
        cy.get(':nth-child(1) > .nav-link > p').click()
        cy.wait(2000);
        cy.get('.main-header > :nth-child(1) > :nth-child(1) > .nav-link').click()
        cy.get(':nth-child(2) > .nav-link > p').click()
        cy.get('.main-header > :nth-child(1) > :nth-child(1) > .nav-link').click()
        cy.wait(2000);
        cy.get('.main-header > :nth-child(1) > :nth-child(1) > .nav-link').click()
        cy.get(':nth-child(4) > .nav-link > p').click()
        cy.wait(2000);
        cy.get('.logo > a').should('have.text', 'SIPMA');
    });
});

