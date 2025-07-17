document.addEventListener("DOMContentLoaded", function () {
    $(function () {
        const languages = [
            { value: "nl", label: "Dutch" },
            { value: "en", label: "English" },
            { value: "fr", label: "French" },
            { value: "de", label: "German" },
            { value: "it", label: "Italian" },
            { value: "pt", label: "Portuguese (Brazil)" },
            { value: "es", label: "Spanish" },
        ];

        const ageRanges = [
            { value: "0-2", label: "0-2" },
            { value: "2-4", label: "2-4" },
            { value: "4-6", label: "4-6" },
            { value: "6-8", label: "6-8" },
            { value: "8+", label: "8+" },
        ];

        // Filter state
        let filters = {
            story: [],
            name: "",
            age: "",
            genders: [],
            languages: [],
        };

        // Helper to update checkbox styles based on checked state
        function updateCheckboxStyle($checkbox) {
            if ($checkbox.is(":checked")) {
                $checkbox
                    .addClass(
                        "data-[state=checked]:bg-gradient-to-r data-[state=checked]:from-purple-500 data-[state=checked]:to-blue-500"
                    )
                    .removeClass("bg-white");
            } else {
                $checkbox
                    .removeClass(
                        "data-[state=checked]:bg-gradient-to-r data-[state=checked]:from-purple-500 data-[state=checked]:to-blue-500"
                    )
                    .addClass("bg-white");
            }
        }

        // Function to render age buttons
        function renderAgeButtons(containerId, currentAge) {
            const $container = $(`#${containerId}`);
            $container.empty();
            ageRanges.forEach((range) => {
                const isActive = currentAge === range.value;
                const buttonClass = `inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-9 px-2 text-xs ${
                    isActive
                        ? "bg-gradient-to-r from-purple-500 to-blue-500 hover:from-purple-600 hover:to-blue-600 text-white border-0"
                        : "border border-purple-300 text-purple-600 hover:bg-purple-50 hover:text-purple-700 bg-transparent"
                }`;
                $container.append(
                    `<button type="button" class="${buttonClass}" data-value="${range.value}">${range.label}</button>`
                );
            });
        }

        // Function to render language list items
        function renderLanguageList(
            containerId,
            search = "",
            selectedLanguages = []
        ) {
            const $container = $(`#${containerId}`);
            $container.empty();
            const filteredLanguages = languages.filter((lang) =>
                lang.label.toLowerCase().includes(search.toLowerCase())
            );

            if (filteredLanguages.length === 0) {
                $container.append(
                    '<li class="py-2 px-3 text-sm text-gray-500">No language found.</li>'
                );
                return;
            }

            filteredLanguages.forEach((lang) => {
                const isSelected = selectedLanguages.includes(lang.value);
                const checkboxChecked = isSelected ? "checked" : "";
                const checkIcon = isSelected
                    ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check ml-auto h-4 w-4 text-purple-600"><path d="M20 6 9 17l-5-5"/></svg>'
                    : "";
                $container.append(`
                    <li class="flex items-center gap-2 px-3 py-2 cursor-pointer hover:bg-purple-50 transition-colors" data-value="${lang.value}">
                        <input type="checkbox" class="peer h-4 w-4 shrink-0 rounded-sm border border-purple-300 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" ${checkboxChecked}>
                        <span class="text-gray-700 text-sm">${lang.label}</span>
                        ${checkIcon}
                    </li>
                `);
            });
            // lucide.createIcons(); // Re-render Lucide icons for newly added elements
        }

        // Function to get selected language labels for display
        function getSelectedLanguageLabels(selectedLanguages) {
            const selectedLabels = selectedLanguages.map(
                (value) =>
                    languages.find((lang) => lang.value === value)?.label ||
                    value
            );
            if (selectedLabels.length === 0) return "Languages";
            if (selectedLabels.length <= 2) return selectedLabels.join(", ");
            return `${selectedLabels
                .slice(0, 2)
                .join(", ")} +${selectedLabels.length - 2} more`;
        }

        // Function to calculate active filter count
        function getActiveFilterCount() {
            let count = 0;
            if (filters.story.length > 0) count += filters.story.length;
            if (filters.name.trim()) count++;
            if (filters.age) count++;
            if (filters.genders.length > 0) count += filters.genders.length;
            if (filters.languages.length > 0) count += filters.languages.length;
            return count;
        }

        // Function to update active filter badges
        function updateActiveFilterBadges() {
            const count = getActiveFilterCount();
            const $desktopBadge = $("#active-filter-badge");
            const $mobileBadge = $("#mobile-active-filter-badge");
            // const $desktopSummary = $("#active-filter-summary-desktop .flex");

            if (count > 0) {
                // $desktopBadge.text(`${count} active`).removeClass("hidden");
                // $mobileBadge.text(count).removeClass("hidden");
                // $desktopSummary.parent().removeClass("hidden");
                // $("#clear-all-desktop").removeClass("hidden");
            } else {
                $desktopBadge.addClass("hidden");
                $mobileBadge.addClass("hidden");
                // $desktopSummary.parent().addClass("hidden");
                $("#clear-all-desktop").addClass("hidden");
            }

            // Render desktop summary badges
            // $desktopSummary.find(".badge-item").remove(); // Clear existing badges
            if (filters.story) {
                // $desktopSummary.append(
                //     `<span class="badge-item bg-gradient-to-r from-purple-100 to-blue-100 text-purple-700 border border-purple-200 text-xs px-2.5 py-0.5 rounded-full">Story</span>`
                // );
            }

            if (filters.name.trim()) {
                // $desktopSummary.append(
                //     `<span class="badge-item bg-gradient-to-r from-purple-100 to-blue-100 text-purple-700 border border-purple-200 text-xs px-2.5 py-0.5 rounded-full">Name: ${filters.name}</span>`
                // );
            }

            if (filters.age) {
                // $desktopSummary.append(
                //     `<span class="badge-item bg-gradient-to-r from-purple-100 to-blue-100 text-purple-700 border border-purple-200 text-xs px-2.5 py-0.5 rounded-full">Age: ${filters.age}</span>`
                // );
            }

            filters.genders.forEach((gender) => {
                // $desktopSummary.append(
                //     `<span class="badge-item bg-gradient-to-r from-purple-100 to-blue-100 text-purple-700 border border-purple-200 text-xs px-2.5 py-0.5 rounded-full">${gender}</span>`
                // );
            });
            if (filters.languages.length > 0) {
                // $desktopSummary.append(
                //     `<span class="badge-item bg-gradient-to-r from-purple-100 to-blue-100 text-purple-700 border border-purple-200 text-xs px-2.5 py-0.5 rounded-full">${
                //         filters.languages.length
                //     } language${filters.languages.length > 1 ? "s" : ""}</span>`
                // );
            }
        }

        // Function to update all UI elements based on filter state
        function updateUI() {
            //Story
            $(".story-desktop").each(function () {
                $(this).prop("checked", filters.story.includes($(this).val()));
            });

            $(".story-mobile").each(function () {
                $(this).prop("checked", filters.story.includes($(this).val()));
            });

            // Name
            $("#name-desktop").val(filters.name);
            $("#name-mobile").val(filters.name);

            // Age
            renderAgeButtons("age-desktop-buttons", filters.age);
            renderAgeButtons("age-mobile-buttons", filters.age);

            // Gender
            $("#boy-desktop").prop("checked", filters.genders.includes("boy"));
            $("#girl-desktop").prop("checked", filters.genders.includes("girl"));
            updateCheckboxStyle($("#boy-desktop"));
            updateCheckboxStyle($("#girl-desktop"));

            $("#boy-mobile").prop("checked", filters.genders.includes("boy"));
            $("#girl-mobile").prop("checked", filters.genders.includes("girl"));
            updateCheckboxStyle($("#boy-mobile"));
            updateCheckboxStyle($("#girl-mobile"));

            // Language
            $("#selected-languages-desktop").text(
                getSelectedLanguageLabels(filters.languages)
            );
            $("#selected-languages-mobile").text(
                getSelectedLanguageLabels(filters.languages)
            );
            renderLanguageList(
                "language-list-desktop",
                $("#language-search-desktop").val(),
                filters.languages
            );
            renderLanguageList(
                "language-list-mobile",
                $("#language-search-mobile").val(),
                filters.languages
            );

            updateActiveFilterBadges();
        }

        // Event Listeners
        $(document).ready(function () {
            updateUI(); // Initial UI render

            // Desktop Collapse Toggle
            $("#toggle-collapse-desktop").on("click", function () {
                const $content = $("#desktop-filter-content");
                const $icon = $("#collapse-icon");
                const $span = $(this).find("span");
                if ($content.hasClass("open")) {
                    $content.removeClass("open");
                    $span.text("Show Filters");
                    $icon.css('transform', 'rotate(180deg)');
                } else {
                    $content.addClass("open");
                    $span.text("Hide Filters");
                    $icon.css('transform', 'rotate(0deg)');
                }
            });

            // Clear All Filters (Desktop)
            $("#clear-all-desktop").on("click", function () {
                filters = {
                    story: [],
                    name: "",
                    age: "",
                    genders: [],
                    languages: [],
                };
                updateUI();
            });

            // Mobile Sheet Toggle
            $("#mobile-filter-trigger").on("click", function () {
                $("#mobile-sheet-overlay").addClass("open");
                $("#mobile-sheet-content").addClass("open");
            });

            $("#mobile-sheet-overlay").on("click", function () {
                $("#mobile-sheet-overlay").removeClass("open");
                $("#mobile-sheet-content").removeClass("open");
            });

            $("#mobile-sheet-close").on("click", function () {
                $("#mobile-sheet-overlay").removeClass("open");
                $("#mobile-sheet-content").removeClass("open");
            });

            // Clear All Filters (Mobile)
            $("#clear-all-mobile").on("click", function () {
                filters = {
                    story: [],
                    name: "",
                    age: "",
                    genders: [],
                    languages: [],
                };
                updateUI();
                // Optionally close the sheet after clearing
                // $('#mobile-sheet-overlay').removeClass('open');
                // $('#mobile-sheet-content').removeClass('open');
            });

            // Filter Interactions (Delegated Events for dynamic content)
            $(document).on("change", ".story-desktop, .story-mobile",
                function () {
                    if ($(this).is(":checked")) {
                        filters.story.push($(this).val());
                    } else {
                        filters.story = filters.story.filter(
                            (story) => story !== $(this).val()
                        );
                    }

                    updateUI();
                }
            );

            $(document).on("change", "#boy-mobile, #girl-mobile", function () {
                if ($(this).is(":checked")) {
                    filters.genders.push($(this).val());
                } else {
                    filters.genders = filters.genders.filter(
                        (g) => g !== $(this).val()
                    );
                }

                updateUI();
            });

            $(document).on("change", "#boy-desktop, #girl-desktop", function () {
                if ($(this).is(":checked")) {
                    filters.genders.push($(this).val());
                } else {
                    filters.genders = filters.genders.filter(
                        (g) => g !== $(this).val()
                    );
                }

                updateUI();
            });

            $(document).on("input", "#name-desktop, #name-mobile", function () {
                filters.name = $(this).val();
                updateUI();
            });

            $(document).on("click", "#age-desktop-buttons button, #age-mobile-buttons button", function () {
                    const value = $(this).data("value");
                    filters.age = filters.age === value ? "" : value;
                    updateUI();
                }
            );

            // $(document).on(
            //     "change",
            //     "#boy-desktop, #girl-desktop, #boy-mobile, #girl-mobile",
            //     function () {
            //         const gender = $(this)
            //             .attr("id")
            //             .replace("-desktop", "")
            //             .replace("-mobile", "");
            //         if ($(this).is(":checked")) {
            //             if (!filters.genders.includes(gender)) {
            //                 filters.genders.push(gender);
            //             }
            //         } else {
            //             filters.genders = filters.genders.filter(
            //                 (g) => g !== gender
            //             );
            //         }

            //         updateUI();
            //     }
            // );

            // Language Dropdown Toggle
            $(document).on("click", "#language-dropdown-trigger-desktop", function (e) {
                    e.stopPropagation();
                    $("#language-dropdown-content-desktop").toggleClass(
                        "hidden"
                    );
                    $("#language-search-desktop").val(""); // Clear search
                    renderLanguageList(
                        "language-list-desktop",
                        "",
                        filters.languages
                    ); // Re-render full list
                }
            );
            $(document).on("click", "#language-dropdown-trigger-mobile", function (e) {
                    e.stopPropagation();
                    $("#language-dropdown-content-mobile").toggleClass(
                        "hidden"
                    );
                    $("#language-search-mobile").val(""); // Clear search
                    renderLanguageList(
                        "language-list-mobile",
                        "",
                        filters.languages
                    ); // Re-render full list
                }
            );

            // Close language dropdown on outside click
            $(document).on("click", function (e) {
                if (
                    !$(e.target).closest(
                        "#language-dropdown-content-desktop, #language-dropdown-trigger-desktop"
                    ).length
                ) {
                    $("#language-dropdown-content-desktop").addClass("hidden");
                }

                if (
                    !$(e.target).closest(
                        "#language-dropdown-content-mobile, #language-dropdown-trigger-mobile"
                    ).length
                ) {
                    $("#language-dropdown-content-mobile").addClass("hidden");
                }
            });

            // Language Search
            $(document).on("input", "#language-search-desktop", function () {
                renderLanguageList(
                    "language-list-desktop",
                    $(this).val(),
                    filters.languages
                );
            });
            $(document).on("input", "#language-search-mobile", function () {
                renderLanguageList(
                    "language-list-mobile",
                    $(this).val(),
                    filters.languages
                );
            });

            // Language Item Selection
            $(document).on("click", "#language-list-desktop li, #language-list-mobile li", function () {
                    const value = $(this).data("value");
                    if (filters.languages.includes(value)) {
                        filters.languages = filters.languages.filter(
                            (l) => l !== value
                        );
                    } else {
                        filters.languages.push(value);
                    }

                    updateUI();
                    // Re-render the list with updated selections and current search query
                    const currentSearchId = $(this)
                        .closest("ul")
                        .attr("id")
                        .replace("language-list", "language-search");
                    const currentSearchQuery = $(`#${currentSearchId}`).val();
                    renderLanguageList(
                        $(this).closest("ul").attr("id"),
                        currentSearchQuery,
                        filters.languages
                    );
                }
            );
        });
    });
});
