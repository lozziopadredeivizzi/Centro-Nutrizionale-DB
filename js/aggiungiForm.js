document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelectorAll('.add-optional').forEach(button => {
        button.addEventListener('click', function() {
            const optionalGroup = this.parentNode;
            const groupId = optionalGroup.parentNode.getAttribute('data-group-id');
            const optionalCount = optionalGroup.querySelectorAll('select').length + 1;

            const newLabel = document.createElement('label');
            newLabel.setAttribute('for', `optional${groupId}-${optionalCount}`);
            newLabel.textContent = `Alimento opzionale ${optionalCount}:`;

            const newSelect = document.createElement('select');
            newSelect.setAttribute('id', `optional${groupId}-${optionalCount}`);
            newSelect.setAttribute('name', `optional[${groupId}][]`);

            const option1 = document.createElement('option');
            option1.value = 'alimento1';
            option1.text = 'Alimento 1';
            newSelect.appendChild(option1);

            const option2 = document.createElement('option');
            option2.value = 'alimento2';
            option2.text = 'Alimento 2';
            newSelect.appendChild(option2);

            const option3 = document.createElement('option');
            option3.value = 'alimento3';
            option3.text = 'Alimento 3';
            newSelect.appendChild(option3);

            optionalGroup.insertBefore(newLabel, this);
            optionalGroup.insertBefore(newSelect, this);
        });
    });

    document.querySelectorAll('.add-group').forEach(button => {
        button.addEventListener('click', function() {
            const form = document.getElementById('dynamic-form');
            const groupCount = form.querySelectorAll('.input-group').length + 1;

            const inputGroup = document.createElement('div');
            inputGroup.classList.add('input-group');
            inputGroup.setAttribute('data-group-id', groupCount);

            const newPrescribedLabel = document.createElement('label');
            newPrescribedLabel.setAttribute('for', `prescribed${groupCount}`);
            newPrescribedLabel.textContent = 'Alimento:';
            
            const newPrescribedSelect = document.createElement('select');
            newPrescribedSelect.setAttribute('id', `prescribed${groupCount}`);
            newPrescribedSelect.setAttribute('name', 'prescribed[]');
            
            const prescribedOption1 = document.createElement('option');
            prescribedOption1.value = 'alimento_prescritto1';
            prescribedOption1.text = 'Alimento Prescritto 1';
            newPrescribedSelect.appendChild(prescribedOption1);
            
            const prescribedOption2 = document.createElement('option');
            prescribedOption2.value = 'alimento_prescritto2';
            prescribedOption2.text = 'Alimento Prescritto 2';
            newPrescribedSelect.appendChild(prescribedOption2);
            
            const prescribedOption3 = document.createElement('option');
            prescribedOption3.value = 'alimento_prescritto3';
            prescribedOption3.text = 'Alimento Prescritto 3';
            newPrescribedSelect.appendChild(prescribedOption3);

            const newMealLabel = document.createElement('label');
            newMealLabel.setAttribute('for', `meal${groupCount}`);
            newMealLabel.textContent = 'Pasto:';
            
            const newMealSelect = document.createElement('select');
            newMealSelect.setAttribute('id', `meal${groupCount}`);
            newMealSelect.setAttribute('name', 'meal[]');
            
            const mealOption1 = document.createElement('option');
            mealOption1.value = 'colazione';
            mealOption1.text = 'Colazione';
            newMealSelect.appendChild(mealOption1);
            
            const mealOption2 = document.createElement('option');
            mealOption2.value = 'pranzo';
            mealOption2.text = 'Pranzo';
            newMealSelect.appendChild(mealOption2);
            
            const mealOption3 = document.createElement('option');
            mealOption3.value = 'cena';
            mealOption3.text = 'Cena';
            newMealSelect.appendChild(mealOption3);
            
            const mealOption4 = document.createElement('option');
            mealOption4.value = 'spuntino';
            mealOption4.text = 'Spuntino';
            newMealSelect.appendChild(mealOption4);

            const newGramsLabel = document.createElement('label');
            newGramsLabel.setAttribute('for', `grams${groupCount}`);
            newGramsLabel.textContent = 'Grammi:';
            
            const newGramsInput = document.createElement('input');
            newGramsInput.setAttribute('type', 'number');
            newGramsInput.setAttribute('id', `grams${groupCount}`);
            newGramsInput.setAttribute('name', 'grams[]');

            const optionalGroup = document.createElement('div');
            optionalGroup.classList.add('optional-group');
            
            const newOptionalLabel = document.createElement('label');
            newOptionalLabel.setAttribute('for', `optional${groupCount}-1`);
            newOptionalLabel.textContent = 'Alimento opzionale 1:';
            
            const newOptionalSelect = document.createElement('select');
            newOptionalSelect.setAttribute('id', `optional${groupCount}-1`);
            newOptionalSelect.setAttribute('name', `optional[${groupCount}][]`);
            
            const optionalOption1 = document.createElement('option');
            optionalOption1.value = 'alimento1';
            optionalOption1.text = 'Alimento 1';
            newOptionalSelect.appendChild(optionalOption1);
            
            const optionalOption2 = document.createElement('option');
            optionalOption2.value = 'alimento2';
            optionalOption2.text = 'Alimento 2';
            newOptionalSelect.appendChild(optionalOption2);
            
            const optionalOption3 = document.createElement('option');
            optionalOption3.value = 'alimento3';
            optionalOption3.text = 'Alimento 3';
            newOptionalSelect.appendChild(optionalOption3);

            const newOptionalButton = document.createElement('button');
            newOptionalButton.type = 'button';
            newOptionalButton.classList.add('add-optional');
            newOptionalButton.textContent = 'Aggiungi Alimento Opzionale';

            optionalGroup.appendChild(newOptionalLabel);
            optionalGroup.appendChild(newOptionalSelect);
            optionalGroup.appendChild(newOptionalButton);

            inputGroup.appendChild(newPrescribedLabel);
            inputGroup.appendChild(newPrescribedSelect);
            inputGroup.appendChild(newMealLabel);
            inputGroup.appendChild(newMealSelect);
            inputGroup.appendChild(newGramsLabel);
            inputGroup.appendChild(newGramsInput);
            inputGroup.appendChild(optionalGroup);

            const addButton = document.createElement('button');
            addButton.type = 'button';
            addButton.classList.add('add-group');
            addButton.textContent = 'Aggiungi Gruppo';

            inputGroup.appendChild(addButton);

            form.insertBefore(inputGroup, document.querySelector('input[type="submit"]'));

            newOptionalButton.addEventListener('click', function() {
                const optionalGroup = this.parentNode;
                const groupId = optionalGroup.parentNode.getAttribute('data-group-id');
                const optionalCount = optionalGroup.querySelectorAll('select').length + 1;

                const newLabel = document.createElement('label');
                newLabel.setAttribute('for', `optional${groupId}-${optionalCount}`);
                newLabel.textContent = `Alimento opzionale ${optionalCount}:`;

                const newSelect = document.createElement('select');
                newSelect.setAttribute('id', `optional${groupId}-${optionalCount}`);
                newSelect.setAttribute('name', `optional[${groupId}][]`);

                const option1 = document.createElement('option');
                option1.value = 'alimento1';
                option1.text = 'Alimento 1';
                newSelect.appendChild(option1);

                const option2 = document.createElement('option');
                option2.value = 'alimento2';
                option2.text = 'Alimento 2';
                newSelect.appendChild(option2);

                const option3 = document.createElement('option');
                option3.value = 'alimento3';
                option3.text = 'Alimento 3';
                newSelect.appendChild(option3);

                optionalGroup.insertBefore(newLabel, this);
                optionalGroup.insertBefore(newSelect, this);
            });

            addButton.addEventListener('click', arguments.callee);
        });
    });
});