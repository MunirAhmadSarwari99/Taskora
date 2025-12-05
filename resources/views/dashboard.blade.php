<x-app-layout>
    <!-- HEADER -->
    <div class="d-flex justify-space-between align-center mb-8">
        <h1 class="text-h4">Dashboard</h1>

        <v-btn color="primary" prepend-icon="mdi-plus" size="large">
            New Task
        </v-btn>
    </div>

    <!-- CATEGORIES -->
    <h2 class="text-h5 mb-4">Categories</h2>

    <v-row>

        <v-col cols="12" md="4">
            <v-card color="primary" class="pa-4 category-card rounded-xl">
                <h3 class="text-white">Work</h3>
                <p class="text-white-50">12 Tasks</p>
            </v-card>
        </v-col>

        <v-col cols="12" md="4">
            <v-card color="warning" class="pa-4 category-card rounded-xl">
                <h3 class="text-black">Personal</h3>
                <p class="text-black">5 Tasks</p>
            </v-card>
        </v-col>

        <v-col cols="12" md="4">
            <v-card color="success" class="pa-4 category-card rounded-xl">
                <h3 class="text-white">Shopping</h3>
                <p class="text-white-50">8 Tasks</p>
            </v-card>
        </v-col>

    </v-row>

    <!-- STATISTICS -->
    <h2 class="text-h5 mt-10 mb-4">Statistics</h2>

    <v-row>
        <v-col cols="12" md="8">
            <v-card color="surface" class="pa-6 rounded-xl">
                <h3 class="mb-4">Completed Tasks</h3>
                <v-progress-linear model-value="70"></v-progress-linear>
                <p class="mt-2">70% completed</p>
            </v-card>
        </v-col>

        <v-col cols="12" md="4">
            <v-card color="surface" class="pa-6 rounded-xl">
                <h3>Total Tasks</h3>
                <h1 class="text-h2">25</h1>
            </v-card>
        </v-col>
    </v-row>

    <!-- TASK LIST -->
    <h2 class="text-h5 mt-10 mb-4">Recent Tasks</h2>

    <v-card color="surface" class="pa-4 rounded-xl">

        <v-list>
            <v-list-item
                v-for="t in tasks"
                :key="t.id"
            >
                <template #prepend>
                    <v-checkbox v-model="t.done"></v-checkbox>
                </template>

                <v-list-item-title>
                    @{{ t.title }}
                </v-list-item-title>

                <template #append>
                    <v-chip size="small" color="primary">@{{ t.category }}</v-chip>
                </template>
            </v-list-item>
        </v-list>

    </v-card>
    @section('AppScript')
        <script>
            var data = {
                data() {
                    return {
                        tasks: [
                            { id: 1, title: "Design landing page", category: "Work", done: false },
                            { id: 2, title: "Buy groceries", category: "Shopping", done: true },
                            { id: 3, title: "Finish Vue project", category: "Work", done: false },
                        ]
                    };
                }

            }
        </script>
    @endsection
</x-app-layout>
