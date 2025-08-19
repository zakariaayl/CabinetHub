<div class="mt-10 min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 p-6">
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold bg-gradient-to-r from-slate-800 to-slate-600 bg-clip-text text-transparent">
                    Event Audit Logs
                </h1>
                <p class="text-slate-600 mt-2">Monitor and track all system activities</p>
            </div>
            <div class="flex gap-3">
                <button class="px-4 py-2 bg-white/70 backdrop-blur-sm border border-white/20 rounded-xl text-slate-700 hover:bg-white/90 transition-all duration-300 shadow-lg hover:shadow-xl">
                    <i class="fas fa-download mr-2"></i>Export
                </button>
                <button id="filterToggle" class="px-4 py-2 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-xl hover:from-blue-600 hover:to-indigo-700 transition-all duration-300 shadow-lg hover:shadow-xl">
                    <i class="fas fa-filter mr-2"></i>Filters
                </button>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white/70 backdrop-blur-sm p-6 rounded-2xl border border-white/20 shadow-lg hover:shadow-xl transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-600 text-sm">Total Events</p>
                    <p class="text-2xl font-bold text-slate-800">{{ number_format($eventAudits->total()) }}</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-chart-line text-white"></i>
                </div>
            </div>
        </div>

        <div class="bg-white/70 backdrop-blur-sm p-6 rounded-2xl border border-white/20 shadow-lg hover:shadow-xl transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-600 text-sm">Today</p>
                    <p class="text-2xl font-bold text-emerald-600">{{ $today ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-calendar-day text-white"></i>
                </div>
            </div>
        </div>

        <div class="bg-white/70 backdrop-blur-sm p-6 rounded-2xl border border-white/20 shadow-lg hover:shadow-xl transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-600 text-sm">This Week</p>
                    <p class="text-2xl font-bold text-amber-600">{{ $thisweek ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-amber-500 to-orange-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-calendar-week text-white"></i>
                </div>
            </div>
        </div>

        <div class="bg-white/70 backdrop-blur-sm p-6 rounded-2xl border border-white/20 shadow-lg hover:shadow-xl transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-600 text-sm">Active Users</p>
                    <p class="text-2xl font-bold text-purple-600">{{ $activeusers ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-users text-white"></i>
                </div>
            </div>
        </div>
    </div>


    <div id="filtersPanel" class="hidden mb-8">
        <div class="bg-white/70 backdrop-blur-sm rounded-2xl border border-white/20 shadow-lg p-6">
            <form method="GET" class="grid grid-cols-1 md:grid-cols-6 gap-4">
                <div class="space-y-2">
                    <label class="text-sm font-medium text-slate-700">Event Type</label>
                    <select name="event_type" class="w-full px-4 py-3 bg-white/50 border border-white/30 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                        <option value="">All Types</option>
                        <option value="created" {{ request('event_type') == 'created' ? 'selected' : '' }}>Created</option>
                        <option value="updated" {{ request('event_type') == 'updated' ? 'selected' : '' }}>Updated</option>
                        <option value="deleted" {{ request('event_type') == 'deleted' ? 'selected' : '' }}>Deleted</option>
                        <option value="login" {{ request('event_type') == 'login' ? 'selected' : '' }}>Login</option>
                        <option value="logout" {{ request('event_type') == 'logout' ? 'selected' : '' }}>Logout</option>
                    </select>
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-medium text-slate-700">Model Type</label>
                    <select name="model_type" class="w-full px-4 py-3 bg-white/50 border border-white/30 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                        <option value="">All Models</option>
                        @foreach($modelTypes as $modelType)
                            <option value="{{ $modelType }}" {{ request('model_type') == $modelType ? 'selected' : '' }}>
                                {{ class_basename($modelType) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-medium text-slate-700">User ID</label>
                    <input type="number" name="user_id" placeholder="Enter User ID"
                           value="{{ request('user_id') }}"
                           class="w-full px-4 py-3 bg-white/50 border border-white/30 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-medium text-slate-700">Date From</label>
                    <input type="date" name="date_from" value="{{ request('date_from') }}"
                           class="w-full px-4 py-3 bg-white/50 border border-white/30 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-medium text-slate-700">Date To</label>
                    <input type="date" name="date_to" value="{{ request('date_to') }}"
                           class="w-full px-4 py-3 bg-white/50 border border-white/30 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-medium text-slate-700">Actions</label>
                    <div class="flex gap-2">
                        <button type="submit" class="flex-1 px-4 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-xl hover:from-blue-600 hover:to-indigo-700 transition-all duration-300 shadow-lg hover:shadow-xl">
                            Apply
                        </button>
                        <a href="" class="flex-1 px-4 py-3 bg-slate-200 text-slate-700 rounded-xl hover:bg-slate-300 transition-all duration-300 text-center">
                            Clear
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="mb-8">
        <div  class="max-w-2xl mx-auto">
            <div class="relative">
                <input type="text" name="search" placeholder="Search event descriptions..."
                       wire:model.live.debounce.500ms="search"
                       class="w-full px-6 py-4 bg-white/70 backdrop-blur-sm border border-white/30 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 shadow-lg text-lg pl-14">
                <div class="absolute left-5 top-1/2 transform -translate-y-1/2">
                    <i class="fas fa-search text-slate-400"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="space-y-4">
        @forelse($eventAudits as $audit)
            <div class="bg-white/70 backdrop-blur-sm rounded-2xl border border-white/20 shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group">
                <div class="p-6">
                    <div class="flex items-start justify-between">
                        <!-- Left Section -->
                        <div class="flex items-start space-x-4 flex-1">
                            <!-- Event Type Badge -->
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 rounded-xl bg-gradient-to-r {{ $audit->event_type == 'created' ? 'from-emerald-500 to-teal-600' : ($audit->event_type == 'updated' ? 'from-amber-500 to-orange-600' : ($audit->event_type == 'deleted' ? 'from-red-500 to-pink-600' : 'from-blue-500 to-indigo-600')) }} flex items-center justify-center shadow-lg">
                                    <i class="fas {{ $audit->event_type == 'created' ? 'fa-plus' : ($audit->event_type == 'updated' ? 'fa-edit' : ($audit->event_type == 'deleted' ? 'fa-trash' : 'fa-cog')) }} text-white"></i>
                                </div>
                            </div>

                            <!-- Event Details -->
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-3 mb-2">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gradient-to-r {{ $audit->event_type == 'created' ? 'from-emerald-500 to-teal-600' : ($audit->event_type == 'updated' ? 'from-amber-500 to-orange-600' : ($audit->event_type == 'deleted' ? 'from-red-500 to-pink-600' : 'from-blue-500 to-indigo-600')) }} text-white shadow-sm">
                                        {{ ucfirst($audit->event_type) }}
                                    </span>

                                    @if($audit->model_type)
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-700">
                                            {{ class_basename($audit->model_type) }}
                                            @if($audit->model_id)
                                                #{{ $audit->model_id }}
                                            @endif
                                        </span>
                                    @endif

                                    <span class="text-xs text-slate-500">
                                        #{{ $audit->id }}
                                    </span>
                                </div>

                                <h3 class="text-lg font-semibold text-slate-800 mb-2 group-hover:text-blue-600 transition-colors duration-300">
                                    {{ $audit->description ?: 'No description available' }}
                                </h3>

                                <div class="flex items-center gap-6 text-sm text-slate-600">
                                    @if($audit->user)
                                        <div class="flex items-center gap-2">
                                            <div class="w-6 h-6 bg-gradient-to-r from-purple-500 to-pink-600 rounded-full flex items-center justify-center">
                                                <i class="fas fa-user text-white text-xs"></i>
                                            </div>
                                            <span>{{ $audit->user->name }}</span>
                                        </div>
                                    @elseif($audit->user_id)
                                        <div class="flex items-center gap-2">
                                            <div class="w-6 h-6 bg-slate-400 rounded-full flex items-center justify-center">
                                                <i class="fas fa-user text-white text-xs"></i>
                                            </div>
                                            <span>User #{{ $audit->user_id }}</span>
                                        </div>
                                    @else
                                        <div class="flex items-center gap-2">
                                            <div class="w-6 h-6 bg-slate-400 rounded-full flex items-center justify-center">
                                                <i class="fas fa-robot text-white text-xs"></i>
                                            </div>
                                            <span>System</span>
                                        </div>
                                    @endif

                                    @if($audit->ip_address)
                                        <div class="flex items-center gap-2">
                                            <i class="fas fa-globe text-slate-400"></i>
                                            <code class="text-xs bg-slate-100 px-2 py-1 rounded">{{ $audit->ip_address }}</code>
                                        </div>
                                    @endif

                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-clock text-slate-400"></i>
                                        <span>{{ $audit->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Section -->
                        <div class="flex items-center gap-3">
                            <div class="text-right text-sm">
                                <div class="font-semibold text-slate-800">{{ $audit->date_event }}</div>
                                <div class="text-slate-500">{{ $audit->created_at->format('H:i:s') }}</div>
                            </div>

                            <button onclick="showAuditDetail({{ $audit->id }})"
                                    class="w-10 h-10 bg-gradient-to-r from-slate-100 to-slate-200 hover:from-blue-500 hover:to-indigo-600 rounded-xl flex items-center justify-center transition-all duration-300 hover:text-white group-hover:shadow-lg">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Changes Preview (if available) -->
                    @if($audit->old_values || $audit->new_values)
                        <div class="mt-4 pt-4 border-t border-slate-200/50">
                            <div class="text-xs text-slate-500 mb-2">Changements detectees</div>
                            <div class="flex gap-2">
                                @if($audit->old_values)
                                @php
    $old = json_decode($audit->old_values, true);
    $new = json_decode($audit->new_values, true);
    $changes = [];

    if ($old && $new) {
        foreach ($old as $key => $oldValue) {
            if (array_key_exists($key, $new) && $new[$key] != $oldValue && $key!="updated_at" && $key!="created_at" ) {
                $changes[$key] = [
                    'old' => $oldValue,
                    'new' => $new[$key]
                ];
            }
        }
    }
@endphp

                                @endif
                                @if(!empty($changes))
    <p class="text-xl font-bold text-blue-600">{{ count($changes) }}</p>
    <ul class="grid grid-cols-1 md:grid-cols-3 gap-3">
        @foreach($changes as $key => $change)
            <li class="bg-indigo-100 opacity-65 p-1 rounded-lg shadow-md hover:shadow-lg transition duration-300 border-l-4 border-indigo-800 ">
                champ modifie : <span class="inline-flex items-center px-2 py-1 rounded text-xs bg-red-50 text-indigo-700 border border-indigo-200">

                          "{{ $key }}"

                                    </span>
                anciene valeur :
                <span class="inline-flex items-center px-2 py-1 rounded text-xs bg-red-50 text-red-700 border border-red-200">
                                        <i class="fas fa-minus mr-1"></i>

                          "{{ $change['old'] }}"

                                    </span>
     @if($audit->new_values)
     nouvelle valeur :
                                    <span class="inline-flex items-center px-2 py-1 rounded text-xs bg-green-50 text-green-700 border border-green-200">
                                        <i class="fas fa-plus mr-1"></i>
                                        "{{ $change['new'] }}"
                                    </span>
                                @endif

            </li>
        @endforeach
    </ul>
@else
    <p>Aucune modification détectée.</p>
@endif

                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <div class="text-center py-16">
                <div class="w-24 h-24 bg-gradient-to-r from-slate-200 to-slate-300 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-inbox text-3xl text-slate-400"></i>
                </div>
                <h3 class="text-xl font-semibold text-slate-600 mb-2">No Events Found</h3>
                <p class="text-slate-500">Try adjusting your search criteria or filters</p>
            </div>
        @endforelse
    </div>

    @if($eventAudits->hasPages())
        <div class="mt-8 flex justify-center">
            <div class="bg-white/70 backdrop-blur-sm rounded-2xl border border-white/20 shadow-lg p-4">
                {{ $eventAudits->appends(request()->query())->links('') }}
            </div>
        </div>
    @endif
    <div id="detailModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-hidden">
        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-6 text-white">
            <div class="flex items-center justify-between">
                <h2 class="text-2xl font-bold">Event Details</h2>
                <button onclick="closeModal()" class="w-8 h-8 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center transition-all duration-300">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        <div id="modalContent" class="p-6 overflow-y-auto max-h-[calc(90vh-100px)]">
            <div class="flex items-center justify-center py-8">
                <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-500"></div>
            </div>
        </div>
    </div>
</div>
</div>



