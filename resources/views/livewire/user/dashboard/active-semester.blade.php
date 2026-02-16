<div class="rounded-xl shadow-sm px-6 py-4" style="background: linear-gradient(148deg,rgba(18, 67, 44, 1) 0%, rgba(30, 119, 77, 1) 54%, rgba(55, 120, 64, 1) 100%);">
    @if(auth()->user()->is_active)
        {{-- User is active: Show semester information --}}
        @if($currentSemester)
            <div class="flex items-center justify-between">
                {{-- Left side: Semester info --}}
                <div class="flex-1 min-w-0">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="flex items-center justify-center w-10 h-10 bg-green-50 rounded-xl">
                            <i class="fas fa-calendar-alt text-green-600"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-white text-lg truncate">
                                {{ $currentSemester->name }}
                            </h3>
                            <p class="text-sm text-gray-300">
                                {{ $currentSemester->start_date->format('M d') }} - {{ $currentSemester->end_date->format('M d, Y') }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Right side: Notification icon and Profile --}}
                <div class="flex items-center gap-2" wire:ignore>
                    @livewire('user.dashboard.notification')
                    
                    {{-- Profile Section with subtle background --}}
                    <a href="{{ route('profile.edit') }}" 
                    class="flex items-center gap-2 bg-black/5 hover:bg-black/10 backdrop-blur-sm px-2 py-1.5 rounded-lg transition-all duration-200 group">
                        <div class="w-9 h-9 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center flex-shrink-0 shadow-lg">
                            <i class="fas fa-user text-white text-sm"></i>
                        </div>
                        <div class="hidden sm:block pr-1">
                            <p class="text-sm font-medium text-white">{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</p>
                        </div>
                    </a>
                </div>
            </div>

            {{-- Status alert (only if needed) --}}
            @if($daysRemaining <= 7 && $daysRemaining > 0)
                <div class="mt-3 flex items-center gap-2 p-2 bg-orange-100 rounded-xl border-l-4 border-orange-400">
                    <i class="fas fa-exclamation-triangle text-orange-500 text-xs"></i>
                    <span class="text-xs text-orange-700 font-medium">
                        Semester ending soon
                    </span>
                </div>
            @elseif($daysRemaining <= 0)
                <div class="mt-3 flex items-center gap-2 p-2 bg-red-100 rounded-xl border-l-4 border-red-400">
                    <i class="fas fa-exclamation-triangle text-red-500 text-xs"></i>
                    <span class="text-xs text-red-700 font-medium">
                        Semester has ended
                    </span>
                </div>
            @endif
        @else
            {{-- No Active Semester - Compact version --}}
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="flex items-center justify-center">
                        <i class="fas fa-triangle-exclamation text-amber-400 text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-white">No Active Semester</h3>
                        <p class="text-sm text-gray-100">Progress, pending, and recent data will be displayed here once a semester is active.</p>
                    </div>
                </div>
                
                {{-- Notification icon and Profile even when no active semester --}}
                <div class="flex items-center gap-3">
                    @livewire('user.dashboard.notification')
                    
                    {{-- Profile Section --}}
                    <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 group">
                        <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center flex-shrink-0 ring-2 ring-white/20 group-hover:ring-white/40 transition-all duration-200">
                            <i class="fas fa-user text-white text-sm"></i>
                        </div>
                        <div class="hidden sm:block">
                            <p class="text-sm font-medium text-white">{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</p>
                            <p class="text-xs text-gray-300">View Profile</p>
                        </div>
                    </a>
                </div>
            </div>
        @endif
    @else
        {{-- User is not active --}}
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="flex items-center justify-center">
                    <i class="fas fa-user-slash text-amber-400 text-2xl"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-white">Account Deactivated</h3>
                    <p class="text-sm text-gray-100">Your account is currently deactivated. Please contact the administrator to reactivate your account.</p>
                </div>
            </div>
            
            {{-- Notification icon and Profile --}}
            <div class="flex items-center gap-3">
                @livewire('user.dashboard.notification')
                
                {{-- Profile Section --}}
                <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 group">
                    <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center flex-shrink-0 ring-2 ring-white/20 group-hover:ring-white/40 transition-all duration-200">
                        <i class="fas fa-user text-white text-sm"></i>
                    </div>
                    <div class="hidden sm:block">
                        <p class="text-sm font-medium text-white">{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</p>
                        <p class="text-xs text-gray-300">View Profile</p>
                    </div>
                </a>
            </div>
        </div>
    @endif
</div>